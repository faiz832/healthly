<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Terms of Service - Healthly AI</title>

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
                    Terms of Service</h1>
                <p class="text-center text-gray-500 mb-12">Last updated: {{ date('F d, Y') }}</p>
                <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                    <div class="p-6 lg:p-8">
                        @php
                            $terms = [
                                [
                                    'title' => 'Acceptance of Terms',
                                    'content' =>
                                        'Dengan mengakses dan menggunakan platform Healthly AI, kamu setuju untuk mematuhi syarat-syarat ini. Jika kamu tidak setuju, harap hentikan penggunaan platform ini.',
                                ],
                                [
                                    'title' => 'Use of Services',
                                    'content' =>
                                        'Kamu hanya boleh menggunakan layanan kami untuk tujuan yang sah. Penyalahgunaan platform, termasuk peretasan, pelanggaran privasi, atau penggunaannya untuk tujuan penipuan, dilarang keras.',
                                ],
                                [
                                    'title' => 'Account Registration',
                                    'content' =>
                                        'Kamu diharuskan memberikan informasi yang akurat dan terkini saat mendaftarkan akun. Kamu bertanggung jawab untuk menjaga keamanan akun dan kata sandimu.',
                                ],
                                [
                                    'title' => 'Subscription Plans',
                                    'content' =>
                                        'Akses ke fitur premium memerlukan langganan. Harga dan manfaat dijelaskan dengan jelas saat pendaftaran. Langganan akan diperpanjang otomatis kecuali dibatalkan sebelum tanggal perpanjangan.',
                                ],
                                [
                                    'title' => 'Refunds and Cancellations',
                                    'content' =>
                                        'Kami tidak menyediakan pengembalian dana untuk pembayaran langganan. Kamu dapat membatalkan langganan kapan saja, dan langganan akan tetap aktif hingga akhir siklus penagihan.',
                                ],
                                [
                                    'title' => 'Content Ownership',
                                    'content' =>
                                        'Semua konten, kursus, dan materi yang disediakan di platform dimiliki oleh Healthly AI atau pemberi lisensi kami. Reproduksi atau distribusi tanpa izin dilarang.',
                                ],
                                [
                                    'title' => 'Modification of Terms',
                                    'content' =>
                                        'Healthly AI berhak untuk memperbarui atau mengubah syarat-syarat ini kapan saja. Perubahan akan berlaku setelah diposting, dan penggunaan platform secara terus-menerus berarti kamu menerima syarat-syarat yang diperbarui.',
                                ],
                                [
                                    'title' => 'Termination',
                                    'content' =>
                                        'Healthly AI dapat mengakhiri atau menangguhkan akunmu jika kamu melanggar salah satu dari syarat-syarat ini. Pengakhiran mungkin mengakibatkan kehilangan akses ke konten dan layanan.',
                                ],
                            ];
                        @endphp

                        <div class="space-y-6">
                            @foreach ($terms as $index => $term)
                                <div class="border-b border-gray-200 pb-6 last:border-b-0 last:pb-0">
                                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $index + 1 }}.
                                        {{ $term['title'] }}</h2>
                                    <p class="text-gray-600">{{ $term['content'] }}</p>
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
