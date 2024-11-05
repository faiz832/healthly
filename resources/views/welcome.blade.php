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
        /* Hide scrollbar in Chrome, Safari and Opera */
        ::-webkit-scrollbar {
            display: none;
        }

        /* carousel */
        :root {
            --item1-transform: translateX(-100%) translateY(-5%) scale(1.5);
            --item1-filter: blur(30px);
            --item1-zIndex: 11;
            --item1-opacity: 0;

            --item2-transform: translateX(0);
            --item2-filter: blur(0px);
            --item2-zIndex: 10;
            --item2-opacity: 1;

            --item3-transform: translate(50%, 10%) scale(0.8);
            --item3-filter: blur(10px);
            --item3-zIndex: 9;
            --item3-opacity: 1;

            --item4-transform: translate(90%, 20%) scale(0.5);
            --item4-filter: blur(30px);
            --item4-zIndex: 8;
            --item4-opacity: 1;

            --item5-transform: translate(120%, 30%) scale(0.3);
            --item5-filter: blur(40px);
            --item5-zIndex: 7;
            --item5-opacity: 0;
        }

        /* carousel */
        .carousel {
            position: relative;
            height: 800px;
        }

        .carousel::before {
            width: 500px;
            height: 300px;
            content: '';
            background-image: linear-gradient(70deg, #0B698B, #9CD3D8);
            position: absolute;
            z-index: -1;
            border-radius: 20% 30% 80% 10%;
            filter: blur(100px);
            top: 50%;
            left: 50%;
            transform: translate(-10%, -50%);
            transition: 1s;
        }

        .carousel .list {
            position: absolute;
            width: 1280px;
            max-width: 100%;
            height: 80%;
            left: 50%;
            transform: translateX(-50%);
        }

        .carousel .list .item {
            position: absolute;
            left: 0%;
            width: 70%;
            height: 100%;
            font-size: 15px;
            transition: left 0.5s, opacity 0.5s, width 0.5s;
        }

        .carousel .list .item:nth-child(n + 6) {
            opacity: 0;
        }

        .carousel .list .item:nth-child(2) {
            z-index: 10;
            transform: translateX(0);
        }

        .carousel .list .item img {
            width: 50%;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            transition: right 1.5s;
        }

        .carousel .list .item .introduce {
            opacity: 0;
            pointer-events: none;
        }

        .carousel .list .item:nth-child(2) .introduce {
            opacity: 1;
            pointer-events: auto;
            width: 400px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            transition: opacity 0.5s;
        }

        .carousel .list .item .introduce .topic {
            font-size: 3.75rem;
            line-height: 1;
            font-weight: bold;
            margin-bottom: 1.5rem;
        }

        .carousel .list .item .introduce .des {
            font-size: 1.125rem;
            line-height: 1.75rem;
            color: #4b5563;
        }

        .carousel .list .item:nth-child(1) {
            transform: var(--item1-transform);
            filter: var(--item1-filter);
            z-index: var(--item1-zIndex);
            opacity: var(--item1-opacity);
            pointer-events: none;
        }

        .carousel .list .item:nth-child(3) {
            transform: var(--item3-transform);
            filter: var(--item3-filter);
            z-index: var(--item3-zIndex);
        }

        .carousel .list .item:nth-child(4) {
            transform: var(--item4-transform);
            filter: var(--item4-filter);
            z-index: var(--item4-zIndex);
        }

        .carousel .list .item:nth-child(5) {
            transform: var(--item5-transform);
            filter: var(--item5-filter);
            opacity: var(--item5-opacity);
            pointer-events: none;
        }

        /* animation text in item2 */
        .carousel .list .item:nth-child(2) .introduce .topic,
        .carousel .list .item:nth-child(2) .introduce .des {
            opacity: 0;
            animation: showContent 0.5s 1s ease-in-out 1 forwards;
        }

        @keyframes showContent {
            from {
                transform: translateY(-30px);
                filter: blur(10px);
            }

            to {
                transform: translateY(0);
                opacity: 1;
                filter: blur(0px);
            }
        }

        .carousel .list .item:nth-child(2) .introduce .des {
            animation-delay: 1.2s;
        }

        /* next click */
        .carousel.next .item:nth-child(1) {
            animation: transformFromPosition2 0.5s ease-in-out 1 forwards;
        }

        @keyframes transformFromPosition2 {
            from {
                transform: var(--item2-transform);
                filter: var(--item2-filter);
                opacity: var(--item2-opacity);
            }
        }

        .carousel.next .item:nth-child(2) {
            animation: transformFromPosition3 0.7s ease-in-out 1 forwards;
        }

        @keyframes transformFromPosition3 {
            from {
                transform: var(--item3-transform);
                filter: var(--item3-filter);
                opacity: var(--item3-opacity);
            }
        }

        .carousel.next .item:nth-child(3) {
            animation: transformFromPosition4 0.9s ease-in-out 1 forwards;
        }

        @keyframes transformFromPosition4 {
            from {
                transform: var(--item4-transform);
                filter: var(--item4-filter);
                opacity: var(--item4-opacity);
            }
        }

        .carousel.next .item:nth-child(4) {
            animation: transformFromPosition5 1.1s ease-in-out 1 forwards;
        }

        @keyframes transformFromPosition5 {
            from {
                transform: var(--item5-transform);
                filter: var(--item5-filter);
                opacity: var(--item5-opacity);
            }
        }

        /* previous */
        .carousel.prev .list .item:nth-child(5) {
            animation: transformFromPosition4 0.5s ease-in-out 1 forwards;
        }

        .carousel.prev .list .item:nth-child(4) {
            animation: transformFromPosition3 0.7s ease-in-out 1 forwards;
        }

        .carousel.prev .list .item:nth-child(3) {
            animation: transformFromPosition2 0.9s ease-in-out 1 forwards;
        }

        .carousel.prev .list .item:nth-child(2) {
            animation: transformFromPosition1 1.1s ease-in-out 1 forwards;
        }

        @keyframes transformFromPosition1 {
            from {
                transform: var(--item1-transform);
                filter: var(--item1-filter);
                opacity: var(--item1-opacity);
            }
        }

        .arrows {
            position: absolute;
            width: 100%;
            max-width: 1280px;
            display: flex;
            justify-content: space-between;
            left: 50%;
            transform: translateX(-50%);
        }

        @media screen and (max-width: 767px) {

            /* mobile */
            .carousel {
                height: 600px;
            }

            .carousel .list .item {
                width: 100%;
                font-size: 10px;
            }

            .carousel .list {
                height: 100%;
            }

            .carousel .list .item:nth-child(2) .introduce {
                width: 50%;
            }

            .carousel .list .item img {
                width: 40%;
            }
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
                    class="flex justify-center items-center h-12 px-6 rounded-md text-white font-bold bg-gradient-to-r from-primaryDark via-primary to-primaryDark transition-all duration-500 ease-in-out btn">Mulai
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
                    class="mx-auto aspect-[0.75] w-full overflow-hidden px-20 pt-12 bg-primaryDark rounded-3xl
                            md:aspect-[1.9] md:px-20 md:pt-20 
                            lg:aspect-[1.9] lg:px-24 lg:pt-24
                            min-[1536px]:w-[min(80vw,1920px)] drop-shadow-dark">
                    <div class="relative h-full w-full overflow-hidden">
                        <video
                            class="hidden md:flex h-full w-full select-none rounded-t-2xl object-cover object-left-top"
                            autoplay muted loop playsinline disablepictureinpicture disableremoteplayback
                            poster="https://bytescale.mobbin.com/FW25bBB/image/assets/videos/lp_flow_video_demo_v1.mp4?t=0">
                            <source type="video/mp4" src="{{ asset('assets/videos/demo-desktop.mp4') }}">
                        </video>
                        <video
                            class="flex md:hidden h-full w-full select-none rounded-t-2xl object-cover object-left-top"
                            autoplay muted loop playsinline disablepictureinpicture disableremoteplayback
                            poster="https://bytescale.mobbin.com/FW25bBB/image/assets/videos/lp_flow_video_demo_v1.mp4?t=0">
                            <source type="video/mp4" src="{{ asset('assets/videos/demo-mobile.mp4') }}">
                        </video>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!--Nutrisi Section -->
    <div class="overflow-hidden">
        <section class="max-w-[1280px] mx-auto p-4 py-6 lg:py-8">
            <div class="relative">
                <div class="carousel">
                    <div class="list">
                        <div class="item">
                            <img src="{{ asset('assets/images/img3d-1.png') }}">
                            <div class="introduce">
                                <div class="topic">Hitung Nutrisi Instan</div>
                                <div class="des">
                                    Unggah foto makananmu, biarkan AI menganalisis kalori, protein, dan nutrisi lainnya
                                    dalam sekejap. Mudah dan cepat!
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/img3d-2.png') }}">
                            <div class="introduce">
                                <div class="topic">Gaya Hidup Sehat</div>
                                <div class="des">
                                    Ketahui kandungan gizi makananmu hanya dengan satu klik. Mulai hidup sehat tanpa
                                    ribet bersama Healthly AI!
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/img3d-3.png') }}">
                            <div class="introduce">
                                <div class="topic">Temukan Gizi Makanan</div>
                                <div class="des">
                                    Dapatkan info nutrisi lengkap dari makananmu. Ideal untuk hidup sehat, diet, dan
                                    menjaga pola makan seimbang.
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('assets/images/img3d-4.png') }}">
                            <div class="introduce">
                                <div class="topic">Analisis Cepat Makananmu</div>
                                <div class="des">
                                    Foto, unggah, dan lihat data nutrisi makananmu dalam detik. Solusi tepat untuk
                                    pantau gizi harian!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-4 md:bottom-56 lg:bottom-44 arrows">
                    <button id="prev"
                        class="w-max flex justify-center items-center h-12 px-6 rounded-md text-white font-bold bg-gradient-to-r from-primaryDark via-primary to-primaryDark transition-all duration-500 ease-in-out btn">Prev</button>
                    <button id="next"
                        class="w-max flex justify-center items-center h-12 px-6 rounded-md text-white font-bold bg-gradient-to-r from-primaryDark via-primary to-primaryDark transition-all duration-500 ease-in-out btn">Next</button>
                </div>
            </div>
        </section>
    </div>

    <!-- Information Section -->
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
                        Dengan Healthly AI, kamu bisa mengetahui detail nutrisi makananmu hanya dengan satu kali klik.
                        Unggah foto makananmu, dan biarkan Healthly AI menganalisis nutrisi untuk gaya hidup yang lebih
                        baik.
                    </p>
                    <a href="{{ route('food.scan') }}"
                        class="mx-auto md:mx-0 w-max flex justify-center items-center h-12 px-6 rounded-md text-white font-bold bg-gradient-to-r from-primaryDark via-primary to-primaryDark transition-all duration-500 ease-in-out btn">
                        Coba Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="max-w-[1280px] mx-auto p-4 py-6 lg:py-8">
        <h1 class="text-5xl font-bold text-center">What They Say</h1>
        <div class="relative flex flex-col flex-wrap mt-24 gap-8">
            <div class="w-full max-w-[1280px] mb-12 columns-1 sm:columns-2 md:columns-3 lg:columns-4 gap-8">
                <div class="flex h-fit w-full flex-col rounded-3xl p-5 break-inside-avoid border border-gray-300 mb-8">
                    <div class="flex gap-4 items-center">
                        <img src="{{ asset('assets/images/Avatar1.png') }}" alt=""
                            class="w-16 h-16 rounded-full object-cover object-center">
                        <div class="">
                            <h1 class="text-lg font-bold text-primaryDark">Raka Wiratama</h1>
                            <p class="text-gray-400">@rakawira</p>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-600"> AI Assistant-nya bikin saya lebih paham tentang pentingnya
                        nutrisi.</p>
                </div>
                <div class="flex h-fit w-full flex-col rounded-3xl p-5 break-inside-avoid border border-gray-300 mb-8">
                    <div class="flex gap-4 items-center">
                        <img src="{{ asset('assets/images/Avatar2.png') }}" alt=""
                            class="w-16 h-16  rounded-full object-cover object-center">
                        <div class="">
                            <h1 class="text-lg font-bold text-primaryDark">Maya Pranindya</h1>
                            <p class="text-gray-400">@mayapran</p>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-600">Sejak saya mulai menggunakan Healthly with AI Assistant,
                        hidup saya berubah total!</p>
                </div>
                <div class="flex h-fit w-full flex-col rounded-3xl p-5 break-inside-avoid border border-gray-300 mb-8">
                    <div class="flex gap-4 items-center">
                        <img src="{{ asset('assets/images/Avatar7.png') }}" alt=""
                            class="w-16 h-16 rounded-full object-cover object-center">
                        <div class="">
                            <h1 class="text-lg font-bold text-primaryDark">Ayu Kartika </h1>
                            <p class="text-gray-400">@ayukartk</p>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-600">Fitur analisis gambar sangat praktis! untuk melihat nutrisi
                        yang ada di makanan</p>
                </div>
                <div class="flex h-fit w-full flex-col rounded-3xl p-5 break-inside-avoid border border-gray-300 mb-8">
                    <div class="flex gap-4 items-center">
                        <img src="{{ asset('assets/images/Avatar8.png') }}" alt=""
                            class="w-16 h-16 rounded-full object-cover object-center">
                        <div class="">
                            <h1 class="text-lg font-bold text-primaryDark">Bayu Setiawan</h1>
                            <p class="text-gray-400">@bayuset</p>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-600">Saya baru mulai menggunakan Healthly with AI Assistant dan
                        wow, perubahan yang saya rasakan luar biasa! dan Saya sangat terkesan dengan fitur analisis
                        gambarnya</p>
                </div>
                <div class="flex h-fit w-full flex-col rounded-3xl p-5 break-inside-avoid border border-gray-300 mb-8">
                    <div class="flex gap-4 items-center">
                        <img src="{{ asset('assets/images/Avatar5.png') }}" alt=""
                            class="w-16 h-16 rounded-full object-cover object-center">
                        <div class="">
                            <h1 class="text-lg font-bold text-primaryDark">Fajar Nugroho</h1>
                            <p class="text-gray-400">@fajarnugra</p>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-600">Healthy with AI Assistant sangat membantu saya memahami
                        kandungan nutrisi makanan secara cepat.</p>
                </div>
                <div class="flex h-fit w-full flex-col rounded-3xl p-5 break-inside-avoid border border-gray-300 mb-8">
                    <div class="flex gap-4 items-center">
                        <img src="{{ asset('assets/images/Avatar6.png') }}" alt=""
                            class="w-16 h-16 rounded-full object-cover object-center">
                        <div class="">
                            <h1 class="text-lg font-bold text-primaryDark">Sinta Lestari</h1>
                            <p class="text-gray-400">@sintalest</p>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-600">Saya sangat terkesan dengan fitur analisis gambar makanan di
                        Healthy AI</p>
                </div>
                <div class="flex h-fit w-full flex-col rounded-3xl p-5 break-inside-avoid border border-gray-300 mb-8">
                    <div class="flex gap-4 items-center">
                        <img src="{{ asset('assets/images/Avatar4.png') }}" alt=""
                            class="w-16 h-16 rounded-full object-cover object-center">
                        <div class="">
                            <h1 class="text-lg font-bold text-primaryDark">Alif Ramadhan</h1>
                            <p class="text-gray-400">@aliframadh</p>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-600">Gak pernah kepikiran bisa punya asisten nutrisi pribadi yang
                        bisa diakses kapan aja.</p>
                </div>
                <div class="flex h-fit w-full flex-col rounded-3xl p-5 break-inside-avoid border border-gray-300 mb-8">
                    <div class="flex gap-4 items-center">
                        <img src="{{ asset('assets/images/Avatar3.png') }}" alt=""
                            class="w-16 h-16 rounded-full object-cover object-center">
                        <div class="">
                            <h1 class="text-lg font-bold text-primaryDark">Putri Anggita</h1>
                            <p class="text-gray-400">@putrianggt</p>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-600">AI Assistant ini bener-bener helpful! Saya bisa menghitung
                        kebutuhan nutrisi harian dan dapet tips sehat yang sesuai dengan gaya hidup saya.</p>
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
                <a href="{{ route('register') }}"
                    class="flex justify-center items-center h-12 px-6 rounded-md text-white font-bold bg-gradient-to-r from-primaryDark via-primary to-primaryDark transition-all duration-500 ease-in-out btn">
                    Ayo Daftar
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

        //carousel animation
        let nextButton = document.getElementById("next");
        let prevButton = document.getElementById("prev");
        let carousel = document.querySelector(".carousel");
        let listHTML = document.querySelector(".carousel .list");

        nextButton.onclick = function() {
            showSlider("next");
        };
        prevButton.onclick = function() {
            showSlider("prev");
        };
        let unAcceppClick;
        const showSlider = (type) => {
            nextButton.style.pointerEvents = "none";
            prevButton.style.pointerEvents = "none";

            carousel.classList.remove("next", "prev");
            let items = document.querySelectorAll(".carousel .list .item");
            if (type === "next") {
                listHTML.appendChild(items[0]);
                carousel.classList.add("next");
            } else {
                listHTML.prepend(items[items.length - 1]);
                carousel.classList.add("prev");
            }
            clearTimeout(unAcceppClick);
            unAcceppClick = setTimeout(() => {
                nextButton.style.pointerEvents = "auto";
                prevButton.style.pointerEvents = "auto";
            }, 2000);
        };

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
