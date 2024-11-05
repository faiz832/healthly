<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

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

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.3s ease-out forwards;
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
                    <p class="text-lg text-gray-600">Gambar makanan kamu akan dianalisa oleh AI Assistant.
                    </p>
                    <!-- Tampilkan Pesan Error Jika Ada -->
                    @if ($errors->any())
                        <div class="mt-2 mb-4 p-4 text-red-700 bg-red-100 border border-red-300 rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Route::has('login'))
                        @auth
                            <div id="uploadContainer"
                                class="w-full flex flex-col justify-center mt-4 px-6 py-12 border-2 border-dashed border-primary rounded-lg text-center transition-all duration-300 ease-in-out">
                                <form id="scanForm" action="{{ route('scan.result') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="food_img" id="fileInput" class="hidden"
                                        accept=".jpg,.jpeg,.png" onchange="showFileName()">
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
                                    <button type="submit" id="scanButton" disabled
                                        class="hidden items-center justify-center mx-auto gap-2 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 mb-4 rounded transition duration-300 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed">
                                        <span id="loadingSpinner" class="hidden">
                                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                                    stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span id="buttonText">Scan Now</span>
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
                                    <div class="bg-white flex flex-col items-center rounded-lg shadow-lg w-[400px] py-12"
                                        @click.away="open = false">
                                        <img src="{{ asset('assets/icons/healthly-dark.png') }}" alt=""
                                            class="w-12 h-12">
                                        <div class="w-[70%] text-center my-6">
                                            <h1 class="text-2xl font-bold">Selamat Datang!
                                            </h1>
                                            <p class="text-gray-600">Silahkan login terlebih dahulu ya</p>
                                        </div>
                                        <div class="z-10 flex flex-col items-center gap-4 mb-4 w-[70%]">
                                            <a href="{{ url('/login') }}"
                                                class="w-full justify-center py-2 px-4 border border-primary rounded-md shadow-sm text-sm font-medium text-primary hover:text-white hover:bg-primaryDark transition duration-300">
                                                Sign In
                                            </a>
                                            <a href="{{ url('/register') }}"
                                                class="w-full justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primaryDark transition duration-300">
                                                Sign Up
                                            </a>
                                        </div>
                                        <div class="flex items-center w-[70%]">
                                            <div class="grow">
                                                <hr>
                                            </div>
                                            <div class="text-center px-3">
                                                or
                                            </div>
                                            <div class="grow">
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="mt-4 w-[70%]">
                                            <a href="{{ route('auth.google') }}"
                                                class="flex items-center justify-center gap-2 px-4 py-2 text-sm text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-100 transition duration-300">
                                                <svg class="w-5 h-5" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                                        fill="#4285F4" />
                                                    <path
                                                        d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                                        fill="#34A853" />
                                                    <path
                                                        d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                                                        fill="#FBBC05" />
                                                    <path
                                                        d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                                                        fill="#EA4335" />
                                                </svg>
                                                Continue with Google
                                            </a>
                                        </div>
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
                        <button onclick="selectImage('{{ asset('assets/images/meal-1.jpg') }}')"
                            class="rounded-lg overflow-hidden select-none shrink-0 relative focus:outline-none focus:ring focus:ring-primary transition ease-in-out active:scale-[0.98]">
                            <div class="w-full h-full hover:opacity-80 active:opacity-60">
                                <figure class="m-0 h-12 w-12 sm:h-16 sm:w-16">
                                    <picture>
                                        <img src="{{ asset('assets/images/meal-1.jpg') }}" alt="Example image"
                                            class="w-full h-full object-cover object-center" loading="lazy"
                                            draggable="false">
                                    </picture>
                                </figure>
                            </div>
                        </button>
                        <button onclick="selectImage('{{ asset('assets/images/meal-2.jpg') }}')"
                            class="rounded-lg overflow-hidden select-none shrink-0 relative focus:outline-none focus:ring focus:ring-primary transition ease-in-out active:scale-[0.98]">
                            <div class="w-full h-full hover:opacity-80 active:opacity-60">
                                <figure class="m-0 h-12 w-12 sm:h-16 sm:w-16">
                                    <picture>
                                        <img src="{{ asset('assets/images/meal-2.jpg') }}" alt="Example image"
                                            class="w-full h-full object-cover object-center" loading="lazy"
                                            draggable="false">
                                    </picture>
                                </figure>
                            </div>
                        </button>
                        <button onclick="selectImage('{{ asset('assets/images/meal-3.jpg') }}')"
                            class="rounded-lg overflow-hidden select-none shrink-0 relative focus:outline-none focus:ring focus:ring-primary transition ease-in-out active:scale-[0.98]">
                            <div class="w-full h-full hover:opacity-80 active:opacity-60">
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
                        <p class="text-xs text-typo-secondary mt-4 text-center">Dengan mengunggah gambar, Anda setuju
                            dengan <a target="_blank" class="text-typo-secondary underline" draggable="false"
                                href="{{ url('/terms') }}">Terms of Service</a> kami.
                            Untuk mempelajari lebih lanjut tentang cara Healthly AI menangani data pribadi Anda, lihat
                            <a target="_blank" rel="noopener" class="underline" style="color: inherit;"
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
        // Function to show the selected file name
        function showFileName() {
            const fileInput = document.getElementById('fileInput');
            const fileName = fileInput.files[0] ? fileInput.files[0].name : '';
            document.getElementById('fileName').textContent = fileName;
        }

        // Function to select an image
        async function selectImage(imageUrl) {
            try {
                const response = await fetch(imageUrl);
                const blob = await response.blob();
                const file = new File([blob], "selected_image.jpg", {
                    type: blob.type
                });

                // Populate the file input
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                document.getElementById('fileInput').files = dataTransfer.files;

                // Show the filename in UI
                document.getElementById('fileName').textContent = file.name;
                document.getElementById('scanButton').classList.remove('hidden');
                document.getElementById('scanButton').classList.add('flex');
                document.getElementById('scanButton').classList.add('animate-fade-in');
                document.getElementById('scanButton').disabled = false;
            } catch (error) {
                console.error("Failed to select image:", error);
            }
        }

        // Add event listeners
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('scanForm');
            const fileInput = document.getElementById('fileInput');
            const fileName = document.getElementById('fileName');
            const scanButton = document.getElementById('scanButton');
            const loadingSpinner = document.getElementById('loadingSpinner');
            const buttonText = document.getElementById('buttonText');

            // Handle file selection
            fileInput.addEventListener('change', function() {
                if (this.files.length > 0) {
                    const file = this.files[0];
                    fileName.textContent = file.name;
                    // Show the scan button with a smooth fade-in effect
                    scanButton.classList.remove('hidden');
                    scanButton.classList.add('flex');
                    scanButton.classList.add('animate-fade-in');
                    scanButton.disabled = false;
                } else {
                    fileName.textContent = '';
                    // Hide the scan button
                    scanButton.classList.add('hidden');
                    scanButton.disabled = true;
                }
            });

            // Handle form submission
            form.addEventListener('submit', function(e) {
                // Validate file input
                if (!fileInput.files.length) {
                    e.preventDefault();
                    alert('Please select a file first');
                    return;
                }

                // Show loading state
                scanButton.disabled = true;
                loadingSpinner.classList.remove('hidden');
                buttonText.textContent = 'Processing...';

                // Add loading cursor
                document.body.style.cursor = 'wait';
            });
        });

        // Reset form state if user navigates back
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                // Reset form elements
                const scanButton = document.getElementById('scanButton');
                const loadingSpinner = document.getElementById('loadingSpinner');
                const buttonText = document.getElementById('buttonText');
                const fileName = document.getElementById('fileName');
                const fileInput = document.getElementById('fileInput');

                scanButton.classList.add('hidden');
                scanButton.disabled = true;
                loadingSpinner.classList.add('hidden');
                buttonText.textContent = 'Scan';
                fileName.textContent = '';
                fileInput.value = '';
                document.body.style.cursor = 'default';
            }
        });
    </script>
</body>

</html>
