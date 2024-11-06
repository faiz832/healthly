<title>BMI - Healthly AI</title>
<x-app-layout>
    <div class="flex">
        <div class="w-full max-w-[1280px] relative flex items-start mx-auto p-4 py-6 lg:py-8 gap-8">
            @include('layouts.sidebar')

            <!-- Main Content -->
            <div class="w-full lg:w-5/6 min-h-screen">
                <div class="space-y-6">
                    <h2 class="text-2xl font-semibold">
                        Input BMI
                    </h2>

                    <div class="bg-white p-4 sm:p-8 rounded-lg shadow">
                        <div class="max-w-xl">
                            <form action="{{ route('bmi.store') }}" method="POST" class="flex flex-col gap-6">
                                @csrf

                                <div>
                                    <x-input-label for="height" :value="__('Height (cm)')" />
                                    <x-text-input id="height" name="height" type="number" class="mt-1 block w-full"
                                        :value="old('height')" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('height')" />
                                </div>

                                <div>
                                    <x-input-label for="weight" :value="__('Weight (kg)')" />
                                    <x-text-input id="weight" name="weight" type="number" class="mt-1 block w-full"
                                        :value="old('weight')" required autofocus />
                                    <x-input-error class="mt-2" :messages="$errors->get('weight')" />
                                </div>

                                <div class="flex items-center gap-4">
                                    <button type="submit"
                                        class="py-2 px-4 bg-primary text-white rounded hover:bg-primaryDark transition duration-300">
                                        Calculate and Save BMI
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
