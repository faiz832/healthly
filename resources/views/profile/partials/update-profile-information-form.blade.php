<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="flex items-center space-x-6">
            <div class="shrink-0">
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

                <img id="avatar-update" class="h-16 w-16 object-cover rounded-full" src="{{ $avatarUrl }}"
                    alt="User Avatar" />
            </div>
            <label class="block">
                <span class="sr-only">Choose profile photo</span>
                <input type="file" name="avatar" id="avatar"
                    class="block w-full text-sm text-slate-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-secondary/10 file:text-primaryDark
                    hover:file:bg-secondary file:cursor-pointer file:transition file:duration-300 file:ease-in-out" />
            </label>
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center mt-12 gap-4">
            <button type="submit"
                class="py-2 px-4 bg-primary text-white rounded hover:bg-primaryDark transition duration-300">
                Save
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

<script>
    document.getElementById('avatar').onchange = function(evt) {
        const [file] = this.files
        if (file) {
            document.getElementById('avatar-update').src = URL.createObjectURL(file)
        }
    }
</script>
