<x-app-layout>
    <div class="flex">
        <div class="w-full max-w-[1280px] relative flex items-start mx-auto p-4 py-6 lg:py-8 gap-8">
            @include('layouts.sidebar')

            <!-- Main Content -->
            <div class="w-full min-h-screen lg:w-5/6">
                <div class="space-y-6">
                    <div class="">
                        <div class="text-2xl font-semibold">Hello {{ Auth::user()->name }}</div>
                        <h1 class="text-sm text-gray-500">Selamat Datang!</h1>
                    </div>
                </div>

                <!-- BMI -->
                <div class="bg-white mt-4 rounded-lg p-6 shadow border border-gray-200">
                    <h2 class="font-semibold mb-4">Body Mass Index Kamu</h2>

                    @forelse ($bmis as $bmi)
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="bg-blue-100 p-4 rounded-lg text-center">
                                <p class="text-sm text-blue-600 font-semibold mb-1">Tinggi</p>
                                <p class="text-2xl font-bold text-blue-800">{{ $bmi->height }} cm</p>
                            </div>
                            <div class="bg-green-100 p-4 rounded-lg text-center">
                                <p class="text-sm text-green-600 font-semibold mb-1">Berat</p>
                                <p class="text-2xl font-bold text-green-800">{{ $bmi->weight }} kg</p>
                            </div>
                            <div class="bg-purple-100 p-4 rounded-lg text-center">
                                <p class="text-sm text-purple-600 font-semibold mb-1">BMI</p>
                                <p class="text-2xl font-bold text-purple-800">{{ number_format($bmi->bmi, 1) }}</p>
                            </div>
                            <div class="bg-yellow-100 p-4 rounded-lg text-center">
                                <p class="text-sm text-yellow-600 font-semibold mb-1">Kategori</p>
                                <p class="text-xl font-bold text-yellow-800">{{ $bmi->category }}</p>
                            </div>
                        </div>
                        <div class="mt-6 text-center">
                            <p class="whitespace-nowrap text-sm text-center text-gray-500">Data terakhir
                                diperbarui pada:
                                {{ $bmi->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <p class="text-gray-500">Kamu belum melakukan perhitungan BMI.</p>
                            <a href="{{ route('bmi.create') }}"
                                class="mt-4 inline-block px-4 py-2 rounded-md text-white font-bold bg-gradient-to-r from-primaryDark via-primary to-primaryDark transition-all duration-500 ease-in-out btn">Hitung
                                BMI Sekarang</a>
                        </div>
                    @endforelse
                </div>

                <!-- Table riwayat analisis -->
                <div class="bg-white mt-4 rounded-lg p-6 shadow border border-gray-200 overflow-auto">
                    <h1 class="font-semibold mb-4">Riwayat Analisis Kamu</h1>
                    <table class="w-full table-auto rounded-lg overflow-hidden shadow">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-12">
                                    No
                                </th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Image
                                </th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Analysis
                                </th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($foods as $food)
                                <tr>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                            <img class="h-10 w-10 object-cover rounded"
                                                src="{{ Storage::url($food->foodImage) }}" alt="makanan kamu"
                                                loading="lazy" />
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-normal text-sm text-gray-900">
                                        {{ $food->analysis }}
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $food->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <a href="{{ url('/scan/' . $food->id) }}" class="flex justify-center">
                                            <svg class="w-6 h-6" viewBox="0 -4 20 20" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>view_simple [#815]</title>
                                                <desc>Created with Sketch.</desc>
                                                <defs>
                                                </defs>
                                                <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <g id="Dribbble-Light-Preview"
                                                        transform="translate(-260.000000, -4563.000000)" fill="#0B698B">
                                                        <g id="icons" transform="translate(56.000000, 160.000000)">
                                                            <path
                                                                d="M216,4409.00052 C216,4410.14768 215.105,4411.07682 214,4411.07682 C212.895,4411.07682 212,4410.14768 212,4409.00052 C212,4407.85336 212.895,4406.92421 214,4406.92421 C215.105,4406.92421 216,4407.85336 216,4409.00052 M214,4412.9237 C211.011,4412.9237 208.195,4411.44744 206.399,4409.00052 C208.195,4406.55359 211.011,4405.0763 214,4405.0763 C216.989,4405.0763 219.805,4406.55359 221.601,4409.00052 C219.805,4411.44744 216.989,4412.9237 214,4412.9237 M214,4403 C209.724,4403 205.999,4405.41682 204,4409.00052 C205.999,4412.58422 209.724,4415 214,4415 C218.276,4415 222.001,4412.58422 224,4409.00052 C222.001,4405.41682 218.276,4403 214,4403"
                                                                id="view_simple-[#815]">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-6 whitespace-nowrap text-center text-gray-500">
                                        Oops! Kamu belum melakukan scan sebelumnya
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
