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
                @if (Route::has('login'))
                    <nav class="relative flex gap-4">
                        @auth
                            <!-- Dropdown Button -->
                            <div class="relative gap-2 py-2 cursor-pointer" x-data="{ open: false }">
                                <button @click="open = !open" @click.away="open = false" class="flex items-center">
                                    <div class="avatar">
                                        @php
                                            $avatarUrl = asset('assets/images/default-avatar.png'); // Default avatar URL

                                            if (Auth::user()->avatar) {
                                                if (Str::startsWith(Auth::user()->avatar, 'https://')) {
                                                    $avatarUrl = Auth::user()->avatar;
                                                } elseif (Str::startsWith(Auth::user()->avatar, 'avatars/')) {
                                                    $avatarUrl = Storage::url(Auth::user()->avatar);
                                                }
                                            }
                                        @endphp

                                        <img id="avatar-preview" class="h-[36px] w-[36px] object-cover rounded-full"
                                            src="{{ $avatarUrl }}" alt="User Avatar" />
                                    </div>
                                </button>
                                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="absolute right-0 mt-2 w-48 shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1"
                                    style="display: none;">
                                    <div class="py-1" role="none">
                                        <a href="{{ route('dashboard') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900"
                                            role="menuitem">Dashboard</a>
                                        <a href="{{ route('profile.edit') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900"
                                            role="menuitem">Profile</a>
                                        <a href="{{ route('settings.edit') }}"
                                            class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900"
                                            role="menuitem">Settings</a>
                                        <form method="POST" action="{{ route('logout') }}" role="none">
                                            @csrf
                                            <button type="submit"
                                                class="text-gray-700 block w-full text-left px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900"
                                                role="menuitem"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                                Log Out
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}"
                                class="rounded-full md:rounded-none bg-primaryDark md:bg-[#f2f2f2] hover:bg-primaryDark p-2 md:py-2 md:px-4 font-semibold text-primaryDark hover:text-white text-center transition duration-300 ease-in-out">
                                <span class="hidden md:inline">Log In</span>
                                <svg viewBox="0 0 24 24" fill="none" class="h-6 w-6 md:hidden"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
                                        stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="#ffffff"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="hidden md:inline bg-primaryDark hover:bg-primaryDark py-2 px-4 font-semibold text-white text-center transition duration-300 ease-in-out">
                                    Sign Up
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
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
