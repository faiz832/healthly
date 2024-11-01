<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Healthly</title>

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

        .aurora-bg {
            overflow: hidden;
            position: relative;
        }

        .aurora-bg::before {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 50%;
            background-image: linear-gradient(83.21deg, #0396a69c 0%, #0B698B 100%);
            --webkit-mask-image: radial-gradient(rgba(0, 0, 0, 0.5), transparent 70%);
            mask-image: radial-gradient(rgba(0, 0, 0, 0.5), transparent 70%);
        }

        .tooltip::before {
            content: "";
            position: absolute;
            bottom: -4px;
            left: 50%;
            transform: translateX(-50%) rotate(45deg);
            width: 8px;
            height: 8px;
            background-color: #ffffff;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="font-sans antialiased">
    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Hero Section -->
    <div class="aurora-b">
        <section class="max-w-[1280px] mx-auto p-4 py-6 lg:py-8">
            <div class="flex flex-col items-center my-24 gap-12">
                <h1
                    class="text-6xl text-center font-bold text-transparent bg-clip-text bg-gradient-to-r from-primaryDark via-secondary to-primary py-2">
                    Healthly with AI Assistant</h1>
                <p class="text-xl text-gray-600 max-w-4xl text-center">Through video consultations, patients can receive
                    expert medical
                    advice,
                    diagnosis, and
                    treatment
                    recommendations without the need </p>
                <div class="">
                    <a href="{{ url('/upload') }}"
                        class="flex justify-center items-center h-12 px-6 bg-primaryDark hover:bg-primaryDark border border-primaryDark hover:border-primaryDark font-semibold text-white text-center transition duration-300 ease-in-out">Get
                        Started</a>
                </div>
            </div>
        </section>
    </div>

    <!-- Demo Section -->
    <div class="overflow-hidden">
        <section class="relative max-w-[1280px] mx-auto p-4 py-6 lg:py-8">
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
                    class="mx-auto aspect-[0.85] w-full overflow-hidden ps-48 pt-64 bg-primaryDark
                            min-[720px]:aspect-[1.14] 
                            min-[720px]:ps-80 min-[720px]:pt-80 
                            min-[1280px]:aspect-[1.9] 
                            min-[1280px]:rounded-3xl 
                            min-[1280px]:px-24 
                            min-[1280px]:pt-24
                            min-[1536px]:w-[min(80vw,1920px)] drop-shadow-lg">
                    <div class="relative h-full w-full overflow-hidden">
                        <video
                            class="h-full w-full select-none rounded-tl-2xl object-cover object-left-top min-[1280px]:rounded-t-2xl"
                            autoplay muted loop playsinline disablepictureinpicture disableremoteplayback
                            poster="https://bytescale.mobbin.com/FW25bBB/image/assets/videos/lp_flow_video_demo_v1.mp4?t=0">
                            <source type="video/mp4"
                                src="https://bytescale.mobbin.com/FW25bBB/video/assets/videos/lp_flow_video_demo_v1.mp4?mute=true&f=mp4-h264&a=/video.mp4&w=500&sh=90&q=6">
                        </video>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Features Section -->
    {{-- <section class="max-w-[1280px] mx-auto p-4 py-6 lg:py-8">
        <div class="my-32">
            <div class="flex flex-col lg:flex-row justify-center items-center gap-24">
                <!-- Left Content Section -->
                <div class="max-w-xl">
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

                <!-- Right Image Grid Section -->
                <div class="relative">
                    <div class="flex gap-8 items-center">
                        <div class="">
                            <!-- Top Image -->
                            <div class="relative">
                                <div class="bg-white rounded-3xl shadow-xl overflow-hidden h-80 w-72">
                                    <img src="{{ asset('assets/images/meal-1.jpg') }}" alt="Berat Ideal"
                                        class="w-full h-full object-cover object-center">
                                </div>
                                <div
                                    class="absolute top-8 -left-16 bg-white px-8 py-4 rounded-full text-sm border font-bold shadow-xl">
                                    Berat Ideal
                                </div>
                            </div>

                            <!-- Top Right Image -->
                            <div class="relative">
                                <div class="bg-white rounded-3xl shadow-xl mt-8 overflow-hidden h-80 w-72">
                                    <img src="{{ asset('assets/images/meal-2.jpg') }}" alt="Pola Makan Sehat"
                                        class="w-full h-full object-cover object-center">
                                </div>
                                <div
                                    class="absolute bottom-8 -right-16 bg-white px-8 py-4 rounded-full text-sm border font-bold shadow-xl">
                                    Nutrisi Optimal
                                </div>
                            </div>
                        </div>

                        <!-- Bottom Image -->
                        <div class="relative">
                            <div class="bg-white rounded-3xl shadow-xl overflow-hidden h-[400px] w-72">
                                <img src="{{ asset('assets/images/meal-3.jpg') }}" alt="Nutrisi Optimal"
                                    class="w-full h-full object-cover object-left">
                            </div>
                            <div
                                class="absolute bottom-32 -right-24 bg-white px-8 py-4 rounded-full text-sm border font-bold shadow-xl">
                                Pola Makan Sehat
                            </div>
                            <!-- Blue Circle Arrow -->
                            <div
                                class="absolute -bottom-8 left-24 bg-primaryDark p-4 rounded-full flex items-center justify-center shadow-xl">
                                <svg width="33" height="33" viewBox="0 0 33 33" fill="none" class="mt-1 ml-1"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.45471 3.52056C2.77257 4.18991 2.52106 5.17787 2.79274 6.09732L9.10985 27.5372C9.38307 28.5073 10.1599 29.1929 11.1444 29.3748C12.1463 29.5607 13.415 28.8945 13.9435 28.0283L18.0442 21.303C18.4646 20.6132 18.3554 19.7253 17.7789 19.1577L10.0194 11.5007C9.61542 11.1153 9.61315 10.4751 10.0144 10.0867C10.4023 9.69853 11.0331 9.69629 11.4371 10.0817L19.198 17.7521C19.7731 18.321 20.666 18.4245 21.3571 18.0019L28.1206 13.8775C28.9241 13.3946 29.3776 12.5659 29.3744 11.659C29.374 11.5522 29.3736 11.4322 29.3597 11.3254C29.2219 10.2855 28.5077 9.46108 27.4999 9.15785L6.04284 2.87112C5.12918 2.59422 4.13687 2.85121 3.45471 3.52056Z"
                                        fill="white" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Features Section -->
    {{-- <section class="max-w-[1280px] mx-auto p-4 py-6 lg:py-8">
        <div class="my-32">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <!-- Left Content Section -->
                <div class="ml-0 lg:ml-24 max-w-xl">
                    <div class="relative flex items-center bg-primaryDark rounded-3xl">
                        <img src="{{ asset('assets/images/avatar-1.png') }}" alt=""
                            class="-mt-24 mb-12 h-[488px] w-[392px]">
                        <div
                            class="absolute top-34 -left-24 bg-white px-8 py-4 rounded-full text-lg border font-bold shadow-xl">
                            Makan Teratur
                        </div>
                        <div
                            class="absolute bottom-24 -right-20 bg-white px-8 py-4 rounded-full text-sm border font-bold shadow-xl">
                            Nutrisi Optimal
                        </div>
                        <div
                            class="absolute top-8 -right-24 bg-white px-8 py-4 rounded-full text-sm border font-bold shadow-xl">
                            Kesehatan Terjaga
                        </div>
                    </div>
                </div>

                <!-- Right Image Grid Section -->
                <div class="max-w-2xl">
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

    {{-- <div class="min-h-screen"></div> --}}

    <!-- Up Button -->
    <div id="scrollToTopBtn" onclick="scrollToTop()"
        class="z-50 fixed bottom-7 right-7 cursor-pointer opacity-0 transform translate-y-10 transition-all duration-300 rounded-lg p-4 bg-primaryDark text-white shadow-lg hover:-translate-y-2">
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
