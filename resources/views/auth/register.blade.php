<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Register - Healthly AI</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex h-screen bg-gray-100">
        <!-- Left side - Digital platform content -->
        <div
            class="hidden md:flex w-3/6 bg-gradient-to-br from-primaryDark to-primary p-12 items-center justify-center relative overflow-hidden">

            <!-- Content container with backdrop-filter for blur effect -->
            <div
                class="relative z-10 bg-white bg-opacity-20 backdrop-filter backdrop-blur-sm rounded p-12 lg:px-12 lg:py-24">
                <div class="text-white max-w-lg">
                    <h1 class="text-4xl lg:text-6xl font-bold mb-8">Digital platform for developer careers.</h1>
                    <p class="text-sm lg:text-lg w-3/4">Improve your tech skills and career prospects with our
                        AI-powered platform
                    </p>
                </div>
            </div>
        </div>

        <!-- Right side - Registration form -->
        <div class="w-full md:w-4/6 bg-white p-16 flex items-center justify-center md:justify-start">
            <div class="w-full max-w-md">
                <a href="{{ url('/') }}" class="flex items-center w-max -ml-1.5 group">
                    <svg class="w-6 transform transition-transform duration-300 group-hover:-translate-x-1"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M15 18L9 12L15 6" stroke="#0396A6" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </g>
                    </svg>
                    <span class="text-xl text-primary">Home</span>
                </a>

                <div class="mb-8">
                    <h2 class="mt-4 text-4xl font-bold">Register</h2>
                    <p class="mt-2 text-gray-600">Create your account</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-4">
                        <x-text-input id="name" class="block mt-1 w-full p-2 border rounded" type="text"
                            name="name" :value="old('name')" required autofocus autocomplete="name"
                            placeholder="Name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mb-4">
                        <x-text-input id="email" class="block mt-1 w-full p-2 border rounded" type="email"
                            name="email" :value="old('email')" required autocomplete="username" placeholder="Email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <x-text-input id="password" class="block mt-1 w-full p-2 border rounded" type="password"
                            name="password" required autocomplete="new-password" placeholder="Password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <x-text-input id="password_confirmation" class="block mt-1 w-full p-2 border rounded"
                            type="password" name="password_confirmation" required autocomplete="new-password"
                            placeholder="Confirm Password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-primary-button
                            class="w-full justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primaryDark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                    <div class="flex items-center justify-center mb-4">
                        <span class="text-sm">Sudah punya akun? </span>
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-primaryDark hover:underline ml-2">
                            {{ __('Log In') }}
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>