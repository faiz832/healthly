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
                                        'By accessing and using the Healthly AI platform, you agree to comply with these terms. If you do not agree, please refrain from using the platform.',
                                ],
                                [
                                    'title' => 'Use of Services',
                                    'content' =>
                                        'You may use our services for lawful purposes only. Misuse of the platform, including hacking, violating privacy, or using it for fraudulent purposes, is strictly prohibited.',
                                ],
                                [
                                    'title' => 'Account Registration',
                                    'content' =>
                                        'You are required to provide accurate and up-to-date information when registering an account. You are responsible for maintaining the security of your account and password.',
                                ],
                                [
                                    'title' => 'Subscription Plans',
                                    'content' =>
                                        'Access to premium features requires a subscription. Pricing and benefits are clearly outlined during registration. Subscriptions renew automatically unless canceled before the renewal date.',
                                ],
                                [
                                    'title' => 'Refunds and Cancellations',
                                    'content' =>
                                        'We offer no refunds for subscription payments. You may cancel your subscription at any time, and it will remain active until the end of the billing cycle.',
                                ],
                                [
                                    'title' => 'Content Ownership',
                                    'content' =>
                                        'All content, courses, and materials provided on the platform are owned by Healthly AI or our licensors. Unauthorized reproduction or distribution is prohibited.',
                                ],
                                [
                                    'title' => 'Modification of Terms',
                                    'content' =>
                                        'Healthly AI reserves the right to update or modify these terms at any time. Changes will be effective upon posting, and continued use of the platform implies acceptance of the revised terms.',
                                ],
                                [
                                    'title' => 'Termination',
                                    'content' =>
                                        'Healthly AI may terminate or suspend your account if you violate any of these terms. Termination may result in loss of access to content and services.',
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
