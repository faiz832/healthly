<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Scan Result - Healthly AI</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Hide scrollbar in Chrome, Safari and Opera */
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen">
        <!-- Navbar -->
        @include('layouts.navbar')

        <!-- Page Content -->
        <div class="max-w-[1200px] mx-auto mt-12 min-h-screen p-4">
            <div class="md:mt-16">
                <div class="w-full sm:w-3/5 lg:w-max mx-auto p-4 border border-gray-300 rounded-3xl shadow-2xl">
                    <div class="flex flex-col lg:flex-row gap-6">
                        <!-- Image Section -->
                        <div class="space-y-4 w-full lg:w-2/5 aspect-[1.1] h-80">
                            <div class="w-full h-full rounded-2xl overflow-hidden shadow-lg">
                                <img src="{{ $imagePath }}" alt="Analyzed Image"
                                    class="w-full h-full object-cover object-center">
                            </div>
                        </div>

                        <!-- Analysis Result Section -->
                        <div class="flex flex-col gap-4 lg:justify-between w-full max-w-md my-2">
                            <div class="space-y-4 w-full">
                                <h1 class="text-3xl font-bold">Hasil analisis AI Assistant</h1>
                                <div class="">
                                    {!! $result !!}
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <a href="{{ route('food.scan') }}"
                                    class="flex justify-center items-center h-12 px-6 rounded-md text-white font-bold bg-gradient-to-r from-primaryDark via-primary to-primaryDark transition-all duration-500 ease-in-out btn">
                                    Scan gambar lain
                                </a>
                                <span class="text-sm text-gray-500 ml-auto mr-2">
                                    Token tersisa: {{ auth()->user()->ai_token }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        @include('layouts.footer')
    </div>

    <!-- Import library canvas-confetti dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fungsi untuk menjalankan efek confetti
            function startConfetti() {
                // Konfetti dari kiri bawah
                confetti({
                    particleCount: 100,
                    spread: 70,
                    origin: {
                        x: 0,
                        y: 0.9
                    }
                });

                // Konfetti dari kanan bawah
                confetti({
                    particleCount: 100,
                    spread: 70,
                    origin: {
                        x: 1,
                        y: 0.9
                    }
                });
            }

            // Jalankan efek confetti
            startConfetti();

            // Optional: Tambahkan konfetti kedua setelah delay
            setTimeout(() => {
                confetti({
                    particleCount: 50,
                    angle: 60,
                    spread: 55,
                    origin: {
                        x: 0
                    }
                });
                confetti({
                    particleCount: 50,
                    angle: 120,
                    spread: 55,
                    origin: {
                        x: 1
                    }
                });
            }, 500);
        });
    </script>
</body>

</html>
