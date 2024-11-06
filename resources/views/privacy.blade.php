<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Privacy Policy - Healthly AI</title>

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

        <div class="py-12 bg-white">
            <div class="max-w-7xl mx-auto p-4 sm:px-6 lg:px-8">
                <h1
                    class="text-6xl text-center font-bold text-transparent bg-clip-text bg-gradient-to-r from-primaryDark via-secondary to-primary py-2 mb-2">
                    Privacy Policy</h1>
                <p class="text-center text-gray-500 mb-12">Last updated: {{ date('F d, Y') }}</p>
                <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                    <div class="p-6 lg:p-8">
                        @php
                            $privacyPolicies = [
                                [
                                    'title' => 'Data Collection',
                                    'content' =>
                                        'Kami mengumpulkan informasi pribadi seperti nama, alamat email, dan detail pembayaran saat kamu mendaftar, berlangganan, atau menggunakan layanan kami. Informasi ini penting untuk manajemen akun dan meningkatkan pengalamanmu.',
                                ],
                                [
                                    'title' => 'Use of Data',
                                    'content' =>
                                        'Datamu digunakan untuk menyediakan dan meningkatkan layanan yang kamu minta, termasuk akses kursus, optimalisasi CV, dan rekomendasi yang dipersonalisasi.',
                                ],
                                [
                                    'title' => 'Data Sharing',
                                    'content' =>
                                        'Kami tidak membagikan informasi pribadi kamu dengan pihak ketiga, kecuali jika diwajibkan oleh hukum atau untuk menyediakan layanan penting (misalnya, pemrosesan pembayaran).',
                                ],
                                [
                                    'title' => 'Cookies',
                                    'content' =>
                                        'Healthly AI menggunakan cookies untuk melacak sesi pengguna, preferensi, dan meningkatkan fungsionalitas platform. Kamu dapat menonaktifkan cookies di pengaturan browser, tetapi hal ini dapat memengaruhi kegunaan platform.',
                                ],
                                [
                                    'title' => 'Data Security',
                                    'content' =>
                                        'Kami menerapkan langkah-langkah keamanan untuk melindungi data pribadi kamu dari akses yang tidak sah. Namun, tidak ada sistem yang 100% aman, dan kami tidak dapat menjamin perlindungan mutlak.',
                                ],
                                [
                                    'title' => 'Third-Party Links',
                                    'content' =>
                                        'Platform kami mungkin menyertakan tautan ke situs web pihak ketiga. Healthly AI tidak bertanggung jawab atas praktik privasi atau konten situs eksternal ini.',
                                ],
                                [
                                    'title' => 'Your Rights',
                                    'content' =>
                                        'Kamu memiliki hak untuk mengakses, memperbaiki, atau menghapus data pribadi kamu kapan saja. Hubungi kami jika kamu ingin mengubah informasi akunmu.',
                                ],
                                [
                                    'title' => 'Changes to Privacy Policy',
                                    'content' =>
                                        'Healthly AI berhak untuk mengubah kebijakan privasi ini. Setiap perubahan akan diberitahukan kepada pengguna melalui email atau pembaruan platform.',
                                ],
                            ];

                        @endphp

                        <div class="space-y-6">
                            @foreach ($privacyPolicies as $index => $policy)
                                <div class="border-b border-gray-200 pb-6 last:border-b-0 last:pb-0">
                                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $index + 1 }}.
                                        {{ $policy['title'] }}</h2>
                                    <p class="text-gray-600">{{ $policy['content'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footer')
    </div>
</body>

</html>
