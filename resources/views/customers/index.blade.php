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
                <th class="px-5 py-3 text-left">Sale Date</th>
            </tr>
            </thead>
            <!-- Body -->
            <tbody class="divide-y divide-gray-200">
                @foreach($customers as $customer)
                <tr class="hover:bg-blue-50 transition duration-200">
                    <td class="px-5 py-3 font-medium">
                        {{ $loop->iteration }}
                    </td>

                    <td class="px-5 py-3">
                    <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded-lg text-xs font-semibold">
                        # {{ $customer->stock->serial_number ?? 'N/A' }}
                    </span>
                    </td>

                    <td class="px-5 py-3 font-semibold text-gray-800">
                        {{ $customer->stock->product->brand->name ?? 'N/A' }}
                    </td>

                    <td class="px-5 py-3">
                        {{ $customer->stock->product->name ?? 'N/A' }}
                    </td>

                    <td class="px-5 py-3">
                    <span class="bg-green-100 text-green-600 px-2 py-1 rounded-lg text-xs font-semibold">
                        {{ $customer->created_at->format('Y-m-d') }}
                    </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
