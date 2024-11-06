<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Not Found - Healthly AI</title>

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

    <!-- Lottie CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.6/lottie.min.js"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen">
        <!-- Navbar -->
        <div id="navbar"
            class="sticky top-0 z-40 w-full backdrop-blur flex-none transition-colors duration-500 bg-white supports-backdrop-blur:bg-white/60">
            <!-- Primary Navigation Menu -->
            <div class="flex items-center h-[70px]">
                <div class="w-[1280px] relative flex items-center justify-between mx-auto p-4 py-6 lg:py-8">
                    <div class="flex items-center gap-4 md:gap-0">
                        <!-- Brand Name -->
                        <a href="{{ url('/') }}" class="flex gap-2">
                            <img src="{{ asset('assets/icons/healthly-dark.png') }}" alt="" class="w-8 h-8">
                            <span class="text-2xl font-semibold mr-4">Healthly AI</span>
                        </a>
                    </div>

                    <!-- Login and Register Buttons -->
                    <div class="flex items-center gap-4">
                        <!-- Login Button -->
                        <a href="{{ url('/') }}"
                            class="flex justify-center items-center h-12 px-6 rounded-md text-white font-bold bg-gradient-to-r from-primaryDark via-primary to-primaryDark transition-all duration-500 ease-in-out btn">
                            Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const navbar = document.getElementById('navbar');

            // Scroll effect
            window.addEventListener('scroll', () => {
                if (window.scrollY > 0) {
                    navbar.classList.add('border-b', 'border-slate-200', 'shadow-md');
                } else {
                    navbar.classList.remove('border-b', 'border-slate-200', 'shadow-md');
                }
            });
        </script>

        <div class="w-full max-w-[1280px] min-h-screen relative flex items-start mx-auto p-4 py-6 lg:py-8 gap-8">
            <div class="flex flex-col items-center w-full">
                <div id="404-animation" class=""></div>
                <div class="flex flex-col items-center w-full pb-16">
                    <p class="text-4xl font-semibold mt-12 text-center w-3/4">Oops!
                        Halaman yang anda cari tidak ditemukan
                    </p>
                </div>
            </div>
        </div>

        <script>
            // Inisialisasi Lottie Animation
            lottie.loadAnimation({
                container: document.getElementById('404-animation'), // ID dari elemen container Lottie
                renderer: 'svg',
                loop: true,
                autoplay: true,
                path: '{{ asset('assets/icons/404.json') }}' // Path ke file animasi JSON
            });
        </script>
        <!-- Footer -->
        @include('layouts.footer')
    </div>
</body>

</html>
