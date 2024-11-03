<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Food Scan - Healthly AI</title>

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
        <section class="max-w-[1280px] mx-auto p-4 py-6 lg:py-8 min-h-screen">
            <div class="mt-16">
                <!-- Upload container -->
                <div class="w-full max-w-5xl mx-auto p-8 border border-gray-300 rounded-3xl shadow-2xl">
                    <h1 class="text-xl font-bold">Upload your food here!</h1>
                    <p class="text-lg text-gray-600">Add your documents here, and you can upload up to 5 files max
                    </p>
                    @if (Route::has('login'))
                        @auth
                            <div id="uploadContainer"
                                class="mt-4 px-6 py-12 bg-white border-2 border-dashed border-gray-300 rounded-lg text-center transition-all duration-300 ease-in-out">
                                <form action="{{ url('/') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="cv_file" id="fileInput" class="hidden"
                                        accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" onchange="showFileName()">
                                    <button type="button" onclick="document.getElementById('fileInput').click()"
                                        class="w-full flex flex-col items-center py-4">
                                        <svg width="37" height="36" viewBox="0 0 37 36" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1386_165)">
                                                <path
                                                    d="M29.525 15.06C28.505 9.885 23.96 6 18.5 6C14.165 6 10.4 8.46 8.525 12.06C4.01 12.54 0.5 16.365 0.5 21C0.5 25.965 4.535 30 9.5 30H29C33.14 30 36.5 26.64 36.5 22.5C36.5 18.54 33.425 15.33 29.525 15.06ZM29 27H9.5C6.185 27 3.5 24.315 3.5 21C3.5 17.925 5.795 15.36 8.84 15.045L10.445 14.88L11.195 13.455C12.62 10.71 15.41 9 18.5 9C22.43 9 25.82 11.79 26.585 15.645L27.035 17.895L29.33 18.06C31.67 18.21 33.5 20.175 33.5 22.5C33.5 24.975 31.475 27 29 27ZM12.5 19.5H16.325V24H20.675V19.5H24.5L18.5 13.5L12.5 19.5Z"
                                                    fill="#0B698B" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1386_165">
                                                    <rect width="36" height="36" fill="white"
                                                        transform="translate(0.5)" />
                                                </clipPath>
                                            </defs>
                                        </svg>Choose Photo
                                    </button>
                                    <p id="fileName" class="text-sm text-gray-500 mb-4"></p>
                                    <button type="submit" id="optimizeButton"
                                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 mb-4 rounded transition duration-300 ease-in-out">
                                        <span class="button-text">Optimize</span>
                                        <span class="loading-spinner"></span>
                                    </button>
                                    <p class="text-sm text-gray-600">Your Token: {{ Auth::user()->ai_token ?? '0' }}
                                    </p>
                                </form>
                            </div>
                        @else
                            <div x-data="{ open: false }"
                                class="relative w-full flex flex-col justify-center mt-4 px-6 py-12 border-2 border-dashed border-primary rounded-lg text-center transition-all duration-300 ease-in-out">
                                <button @click="open = !open" class="flex flex-col items-center py-4">
                                    <svg width="37" height="36" viewBox="0 0 37 36" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1386_165)">
                                            <path
                                                d="M29.525 15.06C28.505 9.885 23.96 6 18.5 6C14.165 6 10.4 8.46 8.525 12.06C4.01 12.54 0.5 16.365 0.5 21C0.5 25.965 4.535 30 9.5 30H29C33.14 30 36.5 26.64 36.5 22.5C36.5 18.54 33.425 15.33 29.525 15.06ZM29 27H9.5C6.185 27 3.5 24.315 3.5 21C3.5 17.925 5.795 15.36 8.84 15.045L10.445 14.88L11.195 13.455C12.62 10.71 15.41 9 18.5 9C22.43 9 25.82 11.79 26.585 15.645L27.035 17.895L29.33 18.06C31.67 18.21 33.5 20.175 33.5 22.5C33.5 24.975 31.475 27 29 27ZM12.5 19.5H16.325V24H20.675V19.5H24.5L18.5 13.5L12.5 19.5Z"
                                                fill="#0B698B" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1386_165">
                                                <rect width="36" height="36" fill="white"
                                                    transform="translate(0.5)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    Choose Photo
                                </button>
                                <p class="text-sm text-gray-600 mb-2">Max file size 5MB. <a href="#"
                                        class="text-blue-500 hover:underline">Sign Up</a> for more</p>
                                <p id="fileName" class="text-sm text-gray-500 mb-4"></p>

                                <!-- Modal Background -->
                                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="transform opacity-0 -translate-x-full"
                                    x-transition:enter-end="transform opacity-100 translate-x-0"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 translate-x-0"
                                    x-transition:leave-end="transform opacity-0 -translate-x-full" style="display: none;"
                                    class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50 transition-opacity duration-300 ease-in-out">
                                    <!-- Modal Content -->
                                    <div class="bg-white flex flex-col items-center rounded-lg shadow-lg w-[400px] p-6"
                                        @click.away="open = false">
                                        <h2 class="text-xl font-semibold my-6">Please log in to continue</h2>
                                        {{-- <p class="text-gray-700 my-6"></p> --}}
                                        <a href="/login"
                                            class="w-2/4 bg-white hover:bg-blue-500 text-blue-500 hover:text-white border border-blue-500 font-bold py-2 px-4 rounded inline-flex items-center justify-center my-4 transition duration-300 ease-in-out">
                                            Log In
                                        </a>
                                        <a href="/register"
                                            class="w-2/4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-flex items-center justify-center mb-6 transition duration-300 ease-in-out">
                                            Sign Up
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endauth
                    @endif
                    <h1 class="text-lg text-gray-600 mt-4">Supported formats: .jpeg .jpg, and .png</h1>
                </div>

                <div class="my-24 flex flex-col items-center">
                    <h1 class="font-bold">Tidak punya gambar? Coba salah satu ini:</h1>
                    <div class="flex gap-2 mt-4">
                        <button data-v-f16f3f3b=""
                            class="btn-image rounded-lg overflow-hidden select-none shrink-0 relative focus:outline-none focus:ring-none focus-visible:ring focus-visible:ring-offset-2 focus-visible:ring-primary-hover focus-visible:outline-none transition ease-in-out active:scale-[0.98] border-1 border-secondary hover:border-secondary-hover active:border-secondary-active"
                            ondragstart="return false;">
                            <div data-v-f16f3f3b=""
                                class="w-full h-full hover:opacity-80 hover:border-secondary-hover active:opacity-60 active:border-secondary-active">
                                <figure class="m-0 h-12 w-12 sm:h-16 sm:w-16">
                                    <picture>
                                        <img src="{{ asset('assets/images/meal-1.jpg') }}" alt="Example image"
                                            class="w-full h-full object-cover object-center" loading="lazy"
                                            draggable="false">
                                    </picture>
                                </figure>
                            </div>
                        </button>
                        <button data-v-f16f3f3b=""
                            class="btn-image rounded-lg overflow-hidden select-none shrink-0 relative focus:outline-none focus:ring-none focus-visible:ring focus-visible:ring-offset-2 focus-visible:ring-primary-hover focus-visible:outline-none transition ease-in-out active:scale-[0.98] border-1 border-secondary hover:border-secondary-hover active:border-secondary-active"
                            ondragstart="return false;">
                            <div data-v-f16f3f3b=""
                                class="w-full h-full hover:opacity-80 hover:border-secondary-hover active:opacity-60 active:border-secondary-active">
                                <figure class="m-0 h-12 w-12 sm:h-16 sm:w-16">
                                    <picture>
                                        <img src="{{ asset('assets/images/meal-2.jpg') }}" alt="Example image"
                                            class="w-full h-full object-cover object-center" loading="lazy"
                                            draggable="false">
                                    </picture>
                                </figure>
                            </div>
                        </button>
                        <button data-v-f16f3f3b=""
                            class="btn-image rounded-lg overflow-hidden select-none shrink-0 relative focus:outline-none focus:ring-none focus-visible:ring focus-visible:ring-offset-2 focus-visible:ring-primary-hover focus-visible:outline-none transition ease-in-out active:scale-[0.98] border-1 border-secondary hover:border-secondary-hover active:border-secondary-active"
                            ondragstart="return false;">
                            <div data-v-f16f3f3b=""
                                class="w-full h-full hover:opacity-80 hover:border-secondary-hover active:opacity-60 active:border-secondary-active">
                                <figure class="m-0 h-12 w-12 sm:h-16 sm:w-16">
                                    <picture>
                                        <img src="{{ asset('assets/images/meal-3.jpg') }}" alt="Example image"
                                            class="w-full h-full object-cover object-center" loading="lazy"
                                            draggable="false">
                                    </picture>
                                </figure>
                            </div>
                        </button>
                    </div>
                    <div class="max-w-md">
                        <p class="text-xs text-typo-secondary mt-4 text-center">By uploading an image you agree
                            to our <a target="_blank" class="text-typo-secondary underline" draggable="false"
                                href="{{ url('/terms') }}">Terms of Service</a>.
                            To learn more about how Healthly AI handles your personal data, check our <a
                                target="_blank" rel="noopener" class="underline" style="color: inherit;"
                                href="{{ url('/privacy') }}">Privacy
                                Policy
                            </a>.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        @include('layouts.footer')
    </div>

    <script>
        function showFileName() {
            const fileInput = document.getElementById('fileInput');
            const fileNameDisplay = document.getElementById('fileName');
            if (fileInput.files.length > 0) {
                fileNameDisplay.textContent = `Selected file: ${fileInput.files[0].name}`;
            } else {
                fileNameDisplay.textContent = '';
            }
        }

        const optimizeButton = document.getElementById('optimizeButton');
        const form = optimizeButton.closest('form');

        form.addEventListener('submit', function(e) {
            // Ubah tombol menjadi mode loading
            optimizeButton.classList.add('button-loading');

            // Nonaktifkan tombol untuk mencegah double-submit
            optimizeButton.disabled = true;

            // Simulasi proses loading (ganti dengan kode submit form yang sebenarnya)
            setTimeout(() => {
                optimizeButton.classList.remove('button-loading');
                optimizeButton.disabled = false;
            }, 30000);
        });
    </script>
</body>

</html>
