<?php

namespace App\Http\Controllers;

use App\Models\Foodscan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FoodScanController extends Controller
{
    public function index()
    {
        return view('scan');
    }

    public function scan(Request $request)
    {
        $request->validate([
            'food_img' => 'required|file|mimes:jpeg,jpg,png|max:5120',
        ]);

        $user = auth()->user(); // Get the authenticated user

        // Check if the user has enough tokens
        if ($user->ai_token < 1) {
            return back()->withErrors('Token tidak mencukupi. Silakan coba lagi.');
        }

        $file = $request->file('food_img');
        $filePath = $file->getPathname();
        $fileMimeType = $file->getClientMimeType();

        try {
            // Store the uploaded image
            $imagePath = $file->store('scan-images', 'public');
            $fileContent = file_get_contents($filePath);
            $base64FileContent = base64_encode($fileContent);

            $prompt = "Analyze the provided food image and calculate the total nutritional values of the food items shown. For each component in the meal, extract the values for calories, protein, and fat, and then sum them for the overall total. Output the total nutrition as follows:
                        Total Nutrisi untuk Porsi ini:
                        Kalori: (total calories) kalori
                        Protein: (total protein) gram
                        Lemak: (total fat) gram
                        Only display the nutrition information as in the provided format, with no additional text or explanations and display it in indonesian language!.
                        if the image is not a food image then the output is 'Gambar ini bukan gambar makanan. Pastikan gambar yang anda masukkan adalah gambar makanan' and if the image cannot be analyzed then the output is 'Gambar ini tidak dapat dianalisis. Silahkan coba lagi'.
                        If you feel that you cannot analyze even if the image entered is a food image then, just provide the nutritional data approximately.";

            $requestBody = [
                'contents' => [
                    [
                        'parts' => [
                            [
                                'text' => $prompt
                            ],
                            [
                                'inline_data' => [
                                    'mime_type' => $fileMimeType,
                                    'data' => $base64FileContent
                                ]
                            ]
                        ]
                    ]
                ]
            ];

            $response = Http::withHeaders([
                'Content-Type' => 'application/json'
            ])->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=' . env('GOOGLE_API_KEY'), $requestBody);

            if ($response->failed()) {
                Storage::disk('public')->delete($imagePath); // Clean up on failure
                Log::error('Google AI API Error: ' . $response->body());
                return back()->withErrors('Gagal memproses gambar. Silakan coba lagi.');
            }

            $data = $response->json();

            // Debugging: Log the entire response
            Log::info('Google AI API Response:', $data);

            // Extract the result text from the response
            $resultText = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;

            if (!$resultText) {
                Storage::disk('public')->delete($imagePath); // Clean up on failure
                Log::warning('No text found in API response');
                return back()->withErrors('Tidak ada hasil. Silakan coba lagi.');
            }

            // Save the scan result to the database
            Foodscan::create([
                'user_id' => $user->id,
                'gambar' => $imagePath,
                'analisis' => $resultText,
            ]);

            // Reduce the user's token by 1
            $user->ai_token -= 1;
            $user->save();

            $formattedResult = $this->formatResult($resultText);

            return view('scan-result', [
                'result' => $formattedResult,
                'imagePath' => Storage::url($imagePath)
            ]);
        } catch (\Exception $e) {
            Log::error('Error processing the file: ' . $e->getMessage());
            return back()->withErrors('Error memproses file. Silakan coba lagi.');
        }
    }

    private function formatResult(string $text): string
    {
        // Mengganti teks yang menggunakan ## sebagai heading
        $text = preg_replace('/##\s*(.*?)(?=\n)/', '<h2 class="text-xl font-bold m-0">$1</h2>', $text);

        // Mengganti teks yang menggunakan ** sebagai strong
        $text = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $text);

        // Mengganti teks yang menggunakan * sebagai list
        $text = preg_replace('/^\*\s*(.*)$/m', '<li class="m-0">$1</li>', $text);

        // Mengganti newline ganda dengan <br>
        $text = nl2br($text);

        // Menambahkan <ul> di sekitar list
        $text = preg_replace('/(<li>.*?<\/li>)/s', '<ul class="m-0">$0</ul>', $text);

        // Mengganti paragraf dengan <p>
        $paragraphs = explode("\n\n", $text);
        $formattedParagraphs = array_map(function ($paragraph) {
            return '<p>' . trim($paragraph) . '</p>';
        }, $paragraphs);

        // Mengembalikan hasil dengan menggabungkan paragraf yang sudah diformat
        return implode("\n", $formattedParagraphs);
    }
}
