<x-app-layout>
    <div class="flex">
        <div class="w-full max-w-[1200px] relative flex items-start mx-auto p-4 py-6 lg:py-8 gap-8">
            @include('layouts.sidebar')

            <!-- Main Content -->
            <div class="w-full min-h-screen lg:w-5/6">
                <div class="space-y-6">
                    <div class="">
                        <div class="text-2xl font-semibold">Hello {{ Auth::user()->name }}</div>
                        <h1 class="text-sm text-gray-500">Welcome Back!</h1>
                    </div>
                </div>

                <!-- Table -->
                <div class="bg-white mt-4 rounded-lg p-6 shadow border border-gray-200 overflow-auto">
                    <h1 class="font-semibold mb-4">Riwayat Analisis Kamu</h1>
                    <table class="w-full rounded-lg overflow-hidden shadow">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Image</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Analysis</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($foods as $food)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-[36px] w-[36px] object-cover rounded"
                                                src="{{ Storage::url($food->gambar) }}" alt="makanan kamu"
                                                loading="lazy" />
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ $food->analisis }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ $food->created_at->format('d-m-Y') }}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
