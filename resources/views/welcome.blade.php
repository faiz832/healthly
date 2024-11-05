<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Healthly AI</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html {
            scroll-behavior: smooth;
        }

        /* Hide scrollbar in Chrome, Safari and Opera */
        ::-webkit-scrollbar {
            display: none;
        }

        /* Swing 1: Berlawanan arah jarum jam */
        @keyframes swing1 {
            0% {
                transform: rotate(90deg) translateX(5px) rotate(-90deg);
            }

            100% {
                transform: rotate(-270deg) translateX(5px) rotate(270deg);
            }
        }

        /* Swing 2: Searah jarum jam */
        @keyframes swing2 {
            0% {
                transform: rotate(90deg) translateX(5px) rotate(-90deg);
            }

            100% {
                transform: rotate(450deg) translateX(5px) rotate(-450deg);
            }
        }

        /* Swing 3: Lintasan miring (diagonal) */
        @keyframes swing3 {
            0% {
                transform: rotate(45deg) translateX(5px) rotate(-45deg);
            }

            100% {
                transform: rotate(405deg) translateX(5px) rotate(-405deg);
            }
        }


        .swing1-animation {
            animation: swing1 3s linear infinite;
        }

        .swing2-animation {
            animation: swing2 3s linear infinite;
        }

        .swing3-animation {
            animation: swing3 3s linear infinite;
        }

        .slider {
            width: 100%;
            height: var(--height);
            overflow: hidden;
            mask-image: linear-gradient(to right,
                    transparent,
                    #000 10% 90%,
                    transparent);
        }

        .slider .list {
            display: flex;
            width: 100%;
            min-width: calc(var(--width) * var(--quantity));
            position: relative;
        }

        .slider .list .item {
            width: var(--width);
            height: var(--height);
            position: absolute;
            left: 100%;
            animation: autoRun 40s linear infinite;
            transition: filter 0.5s;
            animation-delay: calc((40s / var(--quantity)) * (var(--position) - 1) - 40s) !important;
        }

        .slider .list .item img {
            width: 100%;
        }

        @keyframes autoRun {
            from {
                left: 100%;
            }

            to {
                left: calc(var(--width) * -1);
            }
        }

        .slider[reverse="true"] .item {
            animation: reversePlay 40s linear infinite;
        }

        @keyframes reversePlay {
            from {
                left: calc(var(--width) * -1);
            }

            to {
                left: 100%;
            }
        }
    </style>

    <!-- Lottie CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.6/lottie.min.js"></script>
    <!-- GSAP CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
</head>

<body class="font-sans antialiased">
    <!-- Preloader -->
    <div id="loading-screen" class="fixed inset-0 flex flex-col items-center justify-center bg-white z-50">
        <div class="loader-container flex flex-col items-center">
            <!-- Loader Lottie JSON -->
            <div id="lottie-loader" class="w-52 h-52 filter drop-shadow-3xl"></div>
            <!-- Loading text with animated dots -->
            <h1 class="loading-text text-primaryDark font-semibold -mt-12">Loading content please wait
                <span class="dots">.</span>
            </h1>
        </div>
    </div>

    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Hero Section -->
    <section id="hero" class="max-w-[1280px] mx-auto p-4 py-6 lg:py-8 min-h-screen">
        <div class="hero-title hidden flex-col items-center my-20 gap-12">
            <h1
                class="text-6xl text-center font-bold text-transparent bg-clip-text bg-gradient-to-r from-primaryDark via-secondary to-primary py-2">
                Healthly with AI Assistant</h1>
            <p class="text-xl text-gray-600 max-w-4xl text-center">Mau coba gaya hidup sehat yang gak ribet? Yuk,
                biar AI Assistant bantu kamu hitung nutrisi makanan dengan mudah!</p>
            <div class="">
                <a href="{{ route('food.scan') }}"
                    class="flex justify-center items-center h-12 px-6 bg-primaryDark hover:bg-primaryDark border border-primaryDark hover:border-primaryDark font-semibold text-white text-center transition duration-300 ease-in-out">Mulai
                    Sekarang</a>
            </div>
        </div>
        <div class="hero-partners hidden flex-col items-center mb-14">
            <p class="text-gray-600">Dipercaya oleh</p>
            <div class="flex gap-4 md:gap-8 lg:gap-12 mt-8">
                <!-- Bungkus setiap logo dalam div dengan aspect-ratio -->
                <div class="flex aspect-[6/1] items-center justify-center">
                    <img class="w-32 filter grayscale hover:filter-none transition-all duration-300"
                        src="{{ asset('assets/icons/logo_halodoc.png') }}" alt="Logo Halodoc">
                </div>
                <div class="flex aspect-[6/1] items-center justify-center">
                    <img class="w-32 filter grayscale hover:filter-none transition-all duration-300"
                        src="{{ asset('assets/icons/logo_alodokter.png') }}" alt="Logo Alodokter">
                </div>
                <div class="flex aspect-[6/1] items-center justify-center">
                    <img class="w-32 filter grayscale hover:filter-none transition-all duration-300"
                        src="{{ asset('assets/icons/logo_sehatku.png') }}" alt="Logo Sehatku">
                </div>

                <!-- Gambar keempat, hanya tampil di sm ke atas -->
                <div class="hidden sm:flex aspect-[6/1] items-center justify-center">
                    <img class="w-32 filter grayscale hover:filter-none transition-all duration-300"
                        src="{{ asset('assets/icons/logo_keluargasehat.png') }}" alt="Logo Keluarga Sehat">
                </div>

                <!-- Gambar kelima, hanya tampil di md ke atas -->
                <div class="hidden md:flex aspect-[6/1] items-center justify-center">
                    <img class="w-32 filter grayscale hover:filter-none transition-all duration-300"
                        src="{{ asset('assets/icons/logo_healthconnect.png') }}" alt="Logo HealthConnect">
                </div>

                <!-- Gambar keenam, hanya tampil di lg ke atas -->
                <div class="hidden lg:flex aspect-[6/1] items-center justify-center">
                    <img class="w-32 filter grayscale hover:filter-none transition-all duration-300"
                        src="{{ asset('assets/icons/logo_healthcare.png') }}" alt="Logo Healthcare">
                </div>
            </div>
        </div>
    </section>

    <!-- Demo Section -->
    <div class="overflow-hidden">
        <section id="demo" class="relative max-w-[1280px] mx-auto p-4 py-6 lg:py-8">
            <!-- Background Decoration -->
            <div class="absolute top-0 -left-40 z-[-1]">
                <img src="{{ asset('assets/images/decoration-1.png') }}" alt="" class="w-[354px] h-[363px]">
            </div>
            <div class="absolute bottom-0 -right-40 z-[-1]">
                <img src="{{ asset('assets/images/decoration-2.png') }}" alt="" class="w-[354px] h-[240px]">
            </div>

            <!-- Content -->
            <div class="my-24">
                <div
                    class="mx-auto aspect-[0.85] w-full overflow-hidden px-20 pt-12 bg-primaryDark rounded-3xl
                            md:aspect-[1.22] md:px-40 md:pt-20 
                            lg:aspect-[1.9] lg:px-24 lg:pt-24
                            min-[1536px]:w-[min(80vw,1920px)] drop-shadow-dark">
                    <div class="relative h-full w-full overflow-hidden">
                        <video class="h-full w-full select-none rounded-t-2xl object-cover object-left-top" autoplay
                            muted loop playsinline disablepictureinpicture disableremoteplayback
                            poster="https://bytescale.mobbin.com/FW25bBB/image/assets/videos/lp_flow_video_demo_v1.mp4?t=0">
                            <source type="video/mp4"
                                src="https://bytescale.mobbin.com/FW25bBB/video/assets/videos/lp_flow_video_demo_v1.mp4?mute=true&f=mp4-h264&a=/video.mp4">
                        </video>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!--Nutrisi Section -->
    <section class="max-w-[1280px] mx-auto p-4 py-6 lg:py-8">
        <div class="mt-32">
            <div class="flex flex-col justify-center items-center gap-8">
                <h1 class="text-5xl font-bold text-center">Capai Nutrisi Seimbang</h1>
                <p class="text-lg text-gray-600 text-center max-w-xl">Yuk, temukan ragam nutrisi yang pas buat
                    kamu!
                    Kami bantu
                    hitung kebutuhan nutrisimu biar nggak ada yang
                    kurang</p>
            </div>
            <div class="mt-24 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="flex flex-col gap-4 p-5 rounded-3xl border border-gray-300">
                    <img src="{{ asset('assets/icons/healthly-dark.png') }}" alt=""
                        class="w-16 h-16 rounded-full object-cover object-center">
                    <h1 class="text-xl font-bold">Karbohidrat Seimbang</h1>
                    <p class="text-gray-600">Karbohidrat berperan sebagai sumber energi utama.</p>
                </div>
                <div class="flex flex-col gap-4 p-5 rounded-3xl border border-gray-300">
                    <img src="{{ asset('assets/icons/healthly-dark.png') }}" alt=""
                        class="w-16 h-16 rounded-full object-cover object-center">
                    <h1 class="text-xl font-bold">Protein Berkualitas</h1>
                    <p class="text-gray-600">Karbohidrat berperan sebagai sumber energi utama.</p>
                </div>
                <div class="flex flex-col gap-4 p-5 rounded-3xl border border-gray-300">
                    <img src="{{ asset('assets/icons/healthly-dark.png') }}" alt=""
                        class="w-16 h-16 rounded-full object-cover object-center">
                    <h1 class="text-xl font-bold">Lemak Sehat</h1>
                    <p class="text-gray-600">Karbohidrat berperan sebagai sumber energi utama.</p>
                </div>
                <div class="flex flex-col gap-4 p-5 rounded-3xl border border-gray-300">
                    <img src="{{ asset('assets/icons/healthly-dark.png') }}" alt=""
                        class="w-16 h-16 rounded-full object-cover object-center">
                    <h1 class="text-xl font-bold">Karbohidrat Seimbang</h1>
                    <p class="text-gray-600">Karbohidrat berperan sebagai sumber energi utama.</p>
                </div>
                <div class="flex flex-col gap-4 p-5 rounded-3xl border border-gray-300">
                    <img src="{{ asset('assets/icons/healthly-dark.png') }}" alt=""
                        class="w-16 h-16 rounded-full object-cover object-center">
                    <h1 class="text-xl font-bold">Karbohidrat Seimbang</h1>
                    <p class="text-gray-600">Karbohidrat berperan sebagai sumber energi utama.</p>
                </div>
                <div class="flex flex-col gap-4 p-5 rounded-3xl border border-gray-300">
                    <img src="{{ asset('assets/icons/healthly-dark.png') }}" alt=""
                        class="w-16 h-16 rounded-full object-cover object-center">
                    <h1 class="text-xl font-bold">Karbohidrat Seimbang</h1>
                    <p class="text-gray-600">Karbohidrat berperan sebagai sumber energi utama.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features 1 Section -->
    <section class="max-w-[1280px] mx-auto p-4 py-6 lg:py-8">
        <div class="my-32">
            <div class="flex flex-col lg:flex-row justify-center items-center gap-20 lg:gap-4 xl:gap-8">
                <!-- Left Content Section -->
                <div class="relative hidden md:block">
                    <div class="flex gap-8 items-center mx-32 lg:mx-16 xl:mx-20">
                        <div class="w-1/2">
                            <!-- Top left Image -->
                            <div class="relative">
                                <div class="bg-white rounded-3xl drop-shadow-3xl overflow-hidden lg:h-64 xl:h-80">
                                    <img src="{{ asset('assets/images/meal-1.jpg') }}" alt="Image by Iconscout"
                                        class="w-full h-full object-cover object-center">
                                </div>
                                <div
                                    class="absolute top-8 -left-16 bg-white px-4 py-2 xl:px-8 xl:py-4 rounded-full text-sm border font-bold drop-shadow-3xl swing1-animation">
                                    Berat Ideal
                                </div>
                            </div>

                            <!-- Bottom left Image -->
                            <div class="relative">
                                <div class="bg-white rounded-3xl drop-shadow-3xl mt-8 overflow-hidden lg:h-64 xl:h-80">
                                    <img src="{{ asset('assets/images/meal-2.jpg') }}" alt="Image by Iconscout"
                                        class="w-full h-full object-cover object-center">
                                </div>
                                <div
                                    class="absolute bottom-8 -right-16 bg-white px-4 py-2 xl:px-8 xl:py-4 rounded-full text-sm border font-bold shadow-xl swing2-animation">
                                    Nutrisi Optimal
                                </div>
                            </div>
                        </div>

                        <!-- Right Image -->
                        <div class="w-1/2">
                            <div class="relative">
                                <div class="bg-white rounded-3xl drop-shadow-3xl overflow-hidden lg:h-80 xl:h-[400px]">
                                    <img src="{{ asset('assets/images/meal-3.jpg') }}" alt="Image by freepick"
                                        class="w-full h-full object-cover object-left">
                                </div>
                                <div
                                    class="absolute top-12 -right-16 bg-white px-4 py-2 xl:px-8 xl:py-4 rounded-full text-sm border font-bold drop-shadow-3xl swing3-animation">
                                    Makan Sehat
                                </div>
                                <!-- Blue Circle Arrow -->
                                <div
                                    class="absolute -bottom-8 xl:-bottom-10 left-32 lg:left-20 xl:left-32 bg-primaryDark p-2 xl:p-4 rounded-full flex items-center justify-center shadow-xl swing1-animation">
                                    <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                                        class="mt-1 ml-1" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.45471 3.52056C2.77257 4.18991 2.52106 5.17787 2.79274 6.09732L9.10985 27.5372C9.38307 28.5073 10.1599 29.1929 11.1444 29.3748C12.1463 29.5607 13.415 28.8945 13.9435 28.0283L18.0442 21.303C18.4646 20.6132 18.3554 19.7253 17.7789 19.1577L10.0194 11.5007C9.61542 11.1153 9.61315 10.4751 10.0144 10.0867C10.4023 9.69853 11.0331 9.69629 11.4371 10.0817L19.198 17.7521C19.7731 18.321 20.666 18.4245 21.3571 18.0019L28.1206 13.8775C28.9241 13.3946 29.3776 12.5659 29.3744 11.659C29.374 11.5522 29.3736 11.4322 29.3597 11.3254C29.2219 10.2855 28.5077 9.46108 27.4999 9.15785L6.04284 2.87112C5.12918 2.59422 4.13687 2.85121 3.45471 3.52056Z"
                                            fill="white" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Content Section -->
                <div class="max-w-xl">
                    <h1
                        class="text-center md:text-left text-5xl md:text-6xl lg:text-5xl xl:text-6xl font-bold leading-tight mb-6">
                        Unggah Makananmu <br> Sekarang
                    </h1>
                    <p class="text-center md:text-left text-gray-600 text-lg mb-8 leading-relaxed">
                        Bergabunglah dengan ribuan teman-teman yang udah merasakan manfaatnya. Yuk, mulai perjalanan
                        sehatmu dengan AI Assistant!
                    </p>
                    <a href="{{ route('food.scan') }}"
                        class="mx-auto md:mx-0 flex justify-center items-center h-12 px-6 w-max bg-primaryDark hover:bg-primaryDark border border-primaryDark hover:border-primaryDark font-semibold text-white text-center transition duration-300 ease-in-out">
                        Try Now
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features 2 Section -->
    {{-- <section class="max-w-[1280px] mx-auto p-4 py-6 lg:py-8">
        <div class="mb-32 md:my-32">
            <div class="flex flex-col lg:flex-row justify-center items-center gap-20 lg:gap-0 xl:gap-20">
                <!-- Left Content Section -->
                <div class="hidden md:block">
                    <div class="ml-0 lg:mx-16 xl:mx-24 max-w-xl">
                        <div class="relative flex items-center bg-primaryDark rounded-3xl drop-shadow-3xl">
                            <img src="{{ asset('assets/images/avatar-1.png') }}" alt=""
                                class="-mt-24 mb-12 w-full h-full max-h-[476px]">
                            <div
                                class="absolute top-34 -left-24 bg-white px-4 py-2 xl:px-8 xl:py-4 rounded-full text-lg border font-bold shadow-xl">
                                Makan Teratur
                            </div>
                            <div
                                class="absolute bottom-24 -right-20 bg-white px-4 py-2 xl:px-8 xl:py-4 rounded-full text-sm border font-bold shadow-xl">
                                Nutrisi Optimal
                            </div>
                            <div
                                class="absolute top-8 -right-24 bg-white px-4 py-2 xl:px-8 xl:py-4 rounded-full text-sm border font-bold shadow-xl">
                                Kesehatan Terjaga
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Image Grid Section -->
                <div class="max-w-xl xl:max-w-2xl">
                    <h1 class="text-5xl md:text-6xl font-bold leading-tight mb-6">
                        Healthcare with AI<br>
                        Connects Doctors
                    </h1>
                    <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                        Through Video Consultations, Patients Can Receive Expert Medical Advice, Diagnosis, And
                        Treatment Recommendations Without The Need
                    </p>
                    <a href="{{ url('/upload') }}"
                        class="flex justify-center items-center h-12 px-6 w-max bg-primaryDark hover:bg-primaryDark border border-primaryDark hover:border-primaryDark font-semibold text-white text-center transition duration-300 ease-in-out">
                        Try Now
                    </a>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Testimonials Section -->
    <section class="max-w-[1280px] mx-auto p-4 py-6 lg:py-8">
        <h1 class="text-5xl font-bold text-center">What They Say</h1>
        <div class="relative flex flex-col flex-wrap mt-24 gap-8">
            <div class="w-full max-w-screen-[1280px] columns-1 sm:columns-2 md:columns-3 lg:columns-4 gap-8">
                <div class="flex h-fit w-full flex-col rounded-3xl p-5 break-inside-avoid border border-gray-300 mb-8">
                    <div class="flex gap-4 items-center">
                        <img src="{{ asset('assets/icons/healthly-dark.png') }}" alt=""
                            class="w-10 h-10 rounded-full object-cover object-center">
                        <div class="">
                            <h1 class="text-lg font-bold text-primaryDark">Darin Nguyen</h1>
                            <p class="text-gray-400">@staking</p>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-600">By using the Mobbin app, I save both my research time and
                        space in
                        my </p>
                </div>
                <div class="flex h-fit w-full flex-col rounded-3xl p-5 break-inside-avoid border border-gray-300 mb-8">
                    <div class="flex gap-4 items-center">
                        <img src="{{ asset('assets/icons/healthly-dark.png') }}" alt=""
                            class="w-10 h-10 rounded-full object-cover object-center">
                        <div class="">
                            <h1 class="text-lg font-bold text-primaryDark">Darin Nguyen</h1>
                            <p class="text-gray-400">@staking</p>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-600">All my homies love Mobbin. I mean that. I finally deleted
                        that folder of 1,866 unorganized screenshots and haven’t looked back since. Shoutout to Jiho and
                        the team for doing God’s work.</p>
                </div>
                <div class="flex h-fit w-full flex-col rounded-3xl p-5 break-inside-avoid border border-gray-300 mb-8">
                    <div class="flex gap-4 items-center">
                        <img src="{{ asset('assets/icons/healthly-dark.png') }}" alt=""
                            class="w-10 h-10 rounded-full object-cover object-center">
                        <div class="">
                            <h1 class="text-lg font-bold text-primaryDark">Darin Nguyen</h1>
                            <p class="text-gray-400">@staking</p>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-600">By using the Mobbin app, I save both my research time and
                        space in
                        my </p>
                </div>
                <div class="flex h-fit w-full flex-col rounded-3xl p-5 break-inside-avoid border border-gray-300 mb-8">
                    <div class="flex gap-4 items-center">
                        <img src="{{ asset('assets/icons/healthly-dark.png') }}" alt=""
                            class="w-10 h-10 rounded-full object-cover object-center">
                        <div class="">
                            <h1 class="text-lg font-bold text-primaryDark">Darin Nguyen</h1>
                            <p class="text-gray-400">@staking</p>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-600">All my homies love Mobbin. I mean that. I finally deleted
                        that folder of 1,866 unorganized screenshots and haven’t looked back since. Shoutout to Jiho and
                        the team for doing God’s work.</p>
                </div>
                <div class="flex h-fit w-full flex-col rounded-3xl p-5 break-inside-avoid border border-gray-300 mb-8">
                    <div class="flex gap-4 items-center">
                        <img src="{{ asset('assets/icons/healthly-dark.png') }}" alt=""
                            class="w-10 h-10 rounded-full object-cover object-center">
                        <div class="">
                            <h1 class="text-lg font-bold text-primaryDark">Darin Nguyen</h1>
                            <p class="text-gray-400">@staking</p>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-600">By using the Mobbin app, I save both my research time and
                        space in
                        my </p>
                </div>
                <div class="flex h-fit w-full flex-col rounded-3xl p-5 break-inside-avoid border border-gray-300 mb-8">
                    <div class="flex gap-4 items-center">
                        <img src="{{ asset('assets/icons/healthly-dark.png') }}" alt=""
                            class="w-10 h-10 rounded-full object-cover object-center">
                        <div class="">
                            <h1 class="text-lg font-bold text-primaryDark">Darin Nguyen</h1>
                            <p class="text-gray-400">@staking</p>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-600">All my homies love Mobbin. I mean that. I finally deleted
                        that folder of 1,866 unorganized screenshots and haven’t looked back since. Shoutout to Jiho and
                        the team for doing God’s work.</p>
                </div>
                <div class="flex h-fit w-full flex-col rounded-3xl p-5 break-inside-avoid border border-gray-300 mb-8">
                    <div class="flex gap-4 items-center">
                        <img src="{{ asset('assets/icons/healthly-dark.png') }}" alt=""
                            class="w-10 h-10 rounded-full object-cover object-center">
                        <div class="">
                            <h1 class="text-lg font-bold text-primaryDark">Darin Nguyen</h1>
                            <p class="text-gray-400">@staking</p>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-600">By using the Mobbin app, I save both my research time and
                        space in
                        my </p>
                </div>
                <div class="flex h-fit w-full flex-col rounded-3xl p-5 break-inside-avoid border border-gray-300 mb-8">
                    <div class="flex gap-4 items-center">
                        <img src="{{ asset('assets/icons/healthly-dark.png') }}" alt=""
                            class="w-10 h-10 rounded-full object-cover object-center">
                        <div class="">
                            <h1 class="text-lg font-bold text-primaryDark">Darin Nguyen</h1>
                            <p class="text-gray-400">@staking</p>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-600">All my homies love Mobbin. I mean that. I finally deleted
                        that folder of 1,866 unorganized screenshots and haven’t looked back since. Shoutout to Jiho and
                        the team for doing God’s work.</p>
                </div>
                <div class="flex h-fit w-full flex-col rounded-3xl p-5 break-inside-avoid border border-gray-300 mb-8">
                    <div class="flex gap-4 items-center">
                        <img src="{{ asset('assets/icons/healthly-dark.png') }}" alt=""
                            class="w-10 h-10 rounded-full object-cover object-center">
                        <div class="">
                            <h1 class="text-lg font-bold text-primaryDark">Darin Nguyen</h1>
                            <p class="text-gray-400">@staking</p>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-600">By using the Mobbin app, I save both my research time and
                        space in
                        my </p>
                </div>
                <div class="flex h-fit w-full flex-col rounded-3xl p-5 break-inside-avoid border border-gray-300 mb-8">
                    <div class="flex gap-4 items-center">
                        <img src="{{ asset('assets/icons/healthly-dark.png') }}" alt=""
                            class="w-10 h-10 rounded-full object-cover object-center">
                        <div class="">
                            <h1 class="text-lg font-bold text-primaryDark">Darin Nguyen</h1>
                            <p class="text-gray-400">@staking</p>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-600">All my homies love Mobbin. I mean that. I finally deleted
                        that folder of 1,866 unorganized screenshots and haven’t looked back since. Shoutout to Jiho and
                        the team for doing God’s work.</p>
                </div>
                <div class="flex h-fit w-full flex-col rounded-3xl p-5 break-inside-avoid border border-gray-300 mb-8">
                    <div class="flex gap-4 items-center">
                        <img src="{{ asset('assets/icons/healthly-dark.png') }}" alt=""
                            class="w-10 h-10 rounded-full object-cover object-center">
                        <div class="">
                            <h1 class="text-lg font-bold text-primaryDark">Darin Nguyen</h1>
                            <p class="text-gray-400">@staking</p>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-600">By using the Mobbin app, I save both my research time and
                        space in
                        my </p>
                </div>
                <div class="flex h-fit w-full flex-col rounded-3xl p-5 break-inside-avoid border border-gray-300 mb-8">
                    <div class="flex gap-4 items-center">
                        <img src="{{ asset('assets/icons/healthly-dark.png') }}" alt=""
                            class="w-10 h-10 rounded-full object-cover object-center">
                        <div class="">
                            <h1 class="text-lg font-bold text-primaryDark">Darin Nguyen</h1>
                            <p class="text-gray-400">@staking</p>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-600">All my homies love Mobbin. I mean that. I finally deleted
                        that folder of 1,866 unorganized screenshots and haven’t looked back since. Shoutout to Jiho and
                        the team for doing God’s work.</p>
                </div>
            </div>
            <div class="absolute bottom-0 w-full h-48 bg-gradient-to-t from-white to-transparent"></div>
        </div>
    </section>

    <!-- CTA to make account -->
    <section class="max-w-[1280px] mx-auto p-4 py-6 lg:py-8">
        <div class="my-24 flex flex-col gap-8">
            <h1 class="max-w-xl mx-auto text-5xl font-bold text-center">Hitung Nutrisi dalam Makanan Kamu</h1>
            <p class="max-w-md mx-auto text-center text-lg text-gray-600">
                Bergabunglah dengan ribuan teman-teman yang
                udah
                merasakan manfaatnya.
                Yuk, mulai
                perjalanan
                sehatmu dengan AI Assistant!
            </p>
            <div class="flex gap-4 items-center justify-center">
                <a href="{{ route('login') }}"
                    class="bg-[#f2f2f2] hover:bg-primaryDark py-2 px-4 font-semibold text-primaryDark hover:text-white text-center transition duration-300 ease-in-out">
                    Log In
                </a>
                <a href="{{ route('register') }}"
                    class="bg-primaryDark hover:bg-primaryDark py-2 px-4 font-semibold text-white text-center transition duration-300 ease-in-out">
                    Sign Up
                </a>
            </div>
        </div>
    </section>

    <!-- Partners -->
    <section id="partners" class="py-6 lg:py-8">
        <div class="mb-32 space-y-8">
            <div class="slider"
                style="
                --width: 150px;
                --height: 50px;
                --quantity: 7;
                ">
                <div class="list">
                    <div class="item aspect-[6/1] flex justify-center items-center" style="--position: 1">
                        <img src="{{ asset('assets/icons/logo_halodoc.png') }}" alt="">
                    </div>
                    <div class="item aspect-[6/1] flex justify-center items-center" style="--position: 2">
                        <img src="{{ asset('assets/icons/logo_alodokter.png') }}" alt="">
                    </div>
                    <div class="item aspect-[6/1] flex justify-center items-center" style="--position: 3">
                        <img src="{{ asset('assets/icons/logo_healthcare.png') }}" alt="">
                    </div>
                    <div class="item aspect-[6/1] flex justify-center items-center" style="--position: 4">
                        <img src="{{ asset('assets/icons/logo_keluargasehat.png') }}" alt="">
                    </div>
                    <div class="item aspect-[6/1] flex justify-center items-center" style="--position: 5">
                        <img src="{{ asset('assets/icons/logo_sehatbugar.png') }}" alt="">
                    </div>
                    <div class="item aspect-[6/1] flex justify-center items-center" style="--position: 6">
                        <img src="{{ asset('assets/icons/logo_sehatku.png') }}" alt="">
                    </div>
                    <div class="item aspect-[6/1] flex justify-center items-center" style="--position: 7">
                        <img src="{{ asset('assets/icons/logo_healthconnect.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="slider" reverse="true"
                style="
                --width: 150px;
                --height: 50px;
                --quantity: 7;
                ">
                <div class="list">
                    <div class="item aspect-[6/1] flex justify-center items-center" style="--position: 1">
                        <img src="{{ asset('assets/icons/logo_halodoc.png') }}" alt="">
                    </div>
                    <div class="item aspect-[6/1] flex justify-center items-center" style="--position: 2">
                        <img src="{{ asset('assets/icons/logo_alodokter.png') }}" alt="">
                    </div>
                    <div class="item aspect-[6/1] flex justify-center items-center" style="--position: 3">
                        <img src="{{ asset('assets/icons/logo_healthcare.png') }}" alt="">
                    </div>
                    <div class="item aspect-[6/1] flex justify-center items-center" style="--position: 4">
                        <img src="{{ asset('assets/icons/logo_keluargasehat.png') }}" alt="">
                    </div>
                    <div class="item aspect-[6/1] flex justify-center items-center" style="--position: 5">
                        <img src="{{ asset('assets/icons/logo_sehatbugar.png') }}" alt="">
                    </div>
                    <div class="item aspect-[6/1] flex justify-center items-center" style="--position: 6">
                        <img src="{{ asset('assets/icons/logo_sehatku.png') }}" alt="">
                    </div>
                    <div class="item aspect-[6/1] flex justify-center items-center" style="--position: 7">
                        <img src="{{ asset('assets/icons/logo_healthconnect.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="slider"
                style="
                --width: 150px;
                --height: 50px;
                --quantity: 7;
                ">
                <div class="list">
                    <div class="item aspect-[6/1] flex justify-center items-center" style="--position: 1">
                        <img src="{{ asset('assets/icons/logo_halodoc.png') }}" alt="">
                    </div>
                    <div class="item aspect-[6/1] flex justify-center items-center" style="--position: 2">
                        <img src="{{ asset('assets/icons/logo_alodokter.png') }}" alt="">
                    </div>
                    <div class="item aspect-[6/1] flex justify-center items-center" style="--position: 3">
                        <img src="{{ asset('assets/icons/logo_healthcare.png') }}" alt="">
                    </div>
                    <div class="item aspect-[6/1] flex justify-center items-center" style="--position: 4">
                        <img src="{{ asset('assets/icons/logo_keluargasehat.png') }}" alt="">
                    </div>
                    <div class="item aspect-[6/1] flex justify-center items-center" style="--position: 5">
                        <img src="{{ asset('assets/icons/logo_sehatbugar.png') }}" alt="">
                    </div>
                    <div class="item aspect-[6/1] flex justify-center items-center" style="--position: 6">
                        <img src="{{ asset('assets/icons/logo_sehatku.png') }}" alt="">
                    </div>
                    <div class="item aspect-[6/1] flex justify-center items-center" style="--position: 7">
                        <img src="{{ asset('assets/icons/logo_healthconnect.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Up Button -->
    <div id="scrollToTopBtn" onclick="scrollToTop()"
        class="z-40 fixed bottom-7 right-7 cursor-pointer opacity-0 transform translate-y-10 transition-all duration-300 rounded-lg p-4 bg-primaryDark text-white shadow-lg hover:-translate-y-2">
        <!-- SVG Icon for Up Arrow -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
            stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
        </svg>
    </div>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Scripts -->
    <script>
        // Inisialisasi Lottie Animation
        lottie.loadAnimation({
            container: document.getElementById('lottie-loader'), // ID dari elemen container Lottie
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: '{{ asset('assets/icons/loader.json') }}' // Path ke file animasi JSON
        });

        // Animasi titik-titik yang muncul setelah "wait"
        function animateDots() {
            let dotsElement = document.querySelector(".dots");
            let dotsCount = 1;

            setInterval(() => {
                dotsElement.textContent = ".".repeat(dotsCount);
                dotsCount = dotsCount < 3 ? dotsCount + 1 : 1;
            }, 500); // Ubah jumlah titik setiap 500ms
        }

        // Panggil animasi titik-titik
        animateDots();

        // Ketika halaman selesai dimuat
        window.addEventListener("load", () => {
            // Animasi dengan GSAP untuk mengangkat layar preloader
            gsap.to("#loading-screen", {
                y: "-100%", // Geser ke atas layar
                duration: 1, // Durasi animasi
                ease: "power2.inOut", // Kurva kecepatan untuk animasi yang halus
                onComplete: () => {
                    // Sembunyikan elemen preloader setelah animasi selesai
                    document.getElementById("loading-screen").style.display = "none";

                    // Tampilkan elemen hero-title dan hero-partners dengan animasi fade-up
                    document.querySelectorAll("#hero .hero-title, #hero .hero-partners").forEach((el,
                        index) => {
                        el.classList.remove("hidden"); // Hapus kelas hidden
                        el.classList.add("flex"); // Tambahkan kelas flex

                        gsap.from(el, {
                            opacity: 0,
                            y: 50,
                            duration: 0.6,
                            delay: index * 0.2, // Set delay untuk efek berurutan
                            ease: "power2.out"
                        });
                    });
                }
            });
        });

        // Function to scroll to top
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Function to scroll to top
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Function to toggle visibility of the scroll button
        window.onscroll = function() {
            let scrollToTopBtn = document.getElementById("scrollToTopBtn");

            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                scrollToTopBtn.classList.remove("opacity-0", "translate-y-10"); // Show the button with transition
                scrollToTopBtn.classList.add("opacity-100", "translate-y-0");
            } else {
                scrollToTopBtn.classList.remove("opacity-100", "translate-y-0"); // Hide the button with transition
                scrollToTopBtn.classList.add("opacity-0", "translate-y-10");
            }
        };
    </script>
</body>

</html>
