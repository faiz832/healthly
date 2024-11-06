<title>BMI - Healthly AI</title>
<x-app-layout>
    <div class="flex">
        <div class="w-full max-w-[1280px] relative flex items-start mx-auto p-4 py-6 lg:py-8 gap-8">
            @include('layouts.sidebar')

            <!-- Main Content -->
            <div class="w-full min-h-screen lg:w-5/6">
                <div class="space-y-6">
                    <h2 class="text-2xl font-semibold">Body Mass Index</h2>

                    @if (session('success'))
                        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 1000)"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-90"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-90"
                            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg @click="show = false" class="fill-current h-6 w-6 text-green-500" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path
                                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                </svg>
                            </span>
                        </div>
                    @endif

                    <div class="bg-white rounded-lg p-6 shadow border border-gray-200 overflow-auto">
                        <h1 class="font-semibold mb-4">Riwayat Body Mass Index Kamu</h1>
                        <table class="w-full table-auto rounded-lg overflow-hidden shadow">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-12">
                                        No
                                    </th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Height (cm)
                                    </th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Weight (kg)
                                    </th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        BMI
                                    </th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Category
                                    </th>
                                    <th
                                        class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($bmis as $bmi)
                                    <tr>
                                        <td class="px-4 py-4 text-center whitespace-nowrap text-sm">
                                            {{ $loop->iteration }}</td>
                                        <td class="px-4 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                                            {{ $bmi->height }}
                                        </td>
                                        <td class="px-4 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                                            {{ $bmi->weight }}
                                        </td>
                                        <td class="px-4 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                                            {{ number_format($bmi->bmi, 2) }}
                                        </td>
                                        <td
                                            class="px-4 py-4 text-center whitespace-nowrap text-sm font-semibold
                                            @if ($bmi->category == 'Underweight') text-red-500
                                            @elseif ($bmi->category == 'Normal') text-green-500
                                            @elseif ($bmi->category == 'Overweight') text-red-500
                                            @elseif ($bmi->category == 'Obese') text-red-700 @endif">
                                            {{ $bmi->category }}
                                        </td>
                                        <td class="px-4 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                                            {{ $bmi->created_at->format('d M Y') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5"
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
</x-app-layout>
