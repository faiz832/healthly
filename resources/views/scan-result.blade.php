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
            <div class="mt-16">
                <div class="w-full max-w-4xl mx-auto p-4 border border-gray-300 rounded-3xl shadow-2xl">
                    <div class="flex gap-6">
                        <!-- Image Section -->
                        <div class="space-y-4 w-2/5">
                            <div class="w-full h-full rounded-lg overflow-hidden shadow-lg">
                                <img src="{{ $imagePath }}" alt="Analyzed Image"
                                    class="w-full h-full object-cover object-center">
                            </div>
                        </div>

                        <!-- Analysis Result Section -->
                        <div class="flex flex-col justify-between w-3/5 max-w-md my-2">
                            <div class="space-y-4 w-full">
                                <h1 class="text-3xl font-bold">Hasil analisis AI Assistant</h1>
                                <div class="">
                                    {!! $result !!}
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <a href="{{ route('food.scan') }}"
                                    class="justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primaryDark transition duration-300">
                                    Scan gambar lain
                                </a>
                                <span class="text-sm text-gray-500 ml-auto">
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
</body>

</html>
