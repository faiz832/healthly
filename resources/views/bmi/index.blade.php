<title>BMI - Healthly AI</title>
<x-app-layout>
    <div class="flex">
        <div class="w-full max-w-[1280px] relative flex items-start mx-auto p-4 py-6 lg:py-8 gap-8">
            @include('layouts.sidebar')

            <!-- Main Content -->
            <div class="w-full min-h-screen lg:w-5/6">
                <div class="space-y-6">
                    <h2 class="text-2xl font-semibold">Body Mass Index</h2>

                    <div class="space-y-6">
                        <div class="bg-white p-4 sm:p-8 rounded-lg shadow">
                            <div class="max-w-xl">
                                <h1 class="text-lg font-medium text-gray-900">BMI Calculator</h1>
                                <p class="mt-1 text-sm text-gray-600">Hitung Body Mass Index Kamu Sekarang</p>
                                <form action="{{ route('bmi.store') }}" method="POST" class="flex flex-col gap-6 mt-6">
                                    @csrf

                                    <div>
                                        <x-input-label for="height" :value="__('Height (cm)')" />
                                        <x-text-input id="height" name="height" type="number"
                                            class="mt-1 block w-full" :value="old('height')" required autofocus />
                                        <x-input-error class="mt-2" :messages="$errors->get('height')" />
                                    </div>

                                    <div>
                                        <x-input-label for="weight" :value="__('Weight (kg)')" />
                                        <x-text-input id="weight" name="weight" type="number"
                                            class="mt-1 block w-full" :value="old('weight')" required />
                                        <x-input-error class="mt-2" :messages="$errors->get('weight')" />
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <button type="submit"
                                            class="py-2 px-4 bg-primary text-white rounded hover:bg-primaryDark transition duration-300">
                                            Calculate
                                        </button>

                                        @if (session('success'))
                                            <p x-data="{ show: true }" x-show="show" x-transition
                                                x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                                                {{ __('Saved.') }}</p>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg p-6 shadow border border-gray-200 overflow-auto mt-6">
                            <h1 class="font-semibold mb-4">Riwayat Body Mass Index Kamu</h1>
                            <table class="w-full table-auto rounded-lg overflow-hidden shadow">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-12">
                                            No</th>
                                        <th
                                            class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Height (cm)</th>
                                        <th
                                            class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Weight (kg)</th>
                                        <th
                                            class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            BMI</th>
                                        <th
                                            class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Category</th>
                                        <th
                                            class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Date</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($bmis as $bmi)
                                        <tr>
                                            <td class="px-4 py-4 text-center whitespace-nowrap text-sm">
                                                {{ $loop->iteration }}</td>
                                            <td class="px-4 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                                                {{ $bmi->height }}</td>
                                            <td class="px-4 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                                                {{ $bmi->weight }}</td>
                                            <td class="px-4 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                                                {{ number_format($bmi->bmi, 2) }}</td>
                                            <td
                                                class="px-4 py-4 text-center whitespace-nowrap text-sm font-semibold
                                                @if ($bmi->category == 'Underweight') text-red-500
                                                @elseif ($bmi->category == 'Normal') text-green-500
                                                @elseif ($bmi->category == 'Overweight') text-red-500
                                                @elseif ($bmi->category == 'Obese') text-red-700 @endif">
                                                {{ $bmi->category }}
                                            </td>
                                            <td class="px-4 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                                                {{ $bmi->created_at->format('d M Y') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6"
                                                class="px-4 py-6 whitespace-nowrap text-center text-gray-500">
                                                Oops! Kamu belum menghitung BMI sebelumnya
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
