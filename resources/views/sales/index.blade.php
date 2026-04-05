<x-app-layout>
    <div class="overflow-x-auto bg-white rounded-2xl">
        <table class="min-w-full text-sm text-gray-700 border-b">

            <!-- Header -->
            <thead class=bg-gray-100 text-white uppercase text-xs tracking-wider">
            <tr>
                <th class="px-5 py-3 text-left">SL</th>
                <th class="px-5 py-3 text-left">Serial Number</th>
                <th class="px-5 py-3 text-left">Brand Name</th>
                <th class="px-5 py-3 text-left">Product Name</th>
                <th class="px-5 py-3 text-left">User Name</th>
                <th class="px-5 py-3 text-left">Sale Date</th>
            </tr>
            </thead>

            <!-- Body -->
            <tbody class="divide-y divide-gray-200">
            @foreach($sales as $key => $sale)
            <tr class="hover:bg-blue-50 transition duration-200">
                <td class="px-5 py-3 font-medium">{{ $key + 1 }}</td>

                <td class="px-5 py-3">
                    <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded-lg text-xs font-semibold">
                        # {{ $sale->stock->serial_number ?? 'N/A' }}
                    </span>
                </td>

                <td class="px-5 py-3 font-semibold text-gray-800">
                    {{ $sale->stock->product->brand->name ?? 'N/A' }}
                </td>

                <td class="px-5 py-3">
                    {{ $sale->stock->product->name ?? 'N/A' }}
                </td>

                <td class="px-5 py-3 flex items-center gap-2">
                    <div class="w-8 h-8 bg-indigo-500 text-white flex items-center justify-center rounded-full text-xs font-bold">
                        {{ isset($sale->user->name) ? substr($sale->user->name, 0, 2) : 'N/A' }}
                    </div>
                    {{ $sale->user->name ?? 'N/A' }}
                </td>

                <td class="px-5 py-3">
                    <span class="bg-green-100 text-green-600 px-2 py-1 rounded-lg text-xs font-semibold">
                        {{ $sale->created_at->format('Y-m-d') }}
                    </span>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
