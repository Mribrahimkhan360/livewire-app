<x-app-layout>
    <div class="p-6 max-w-3xl mx-auto bg-white rounded-xl">

        <h2 class="text-xl font-bold mb-4">
            Upload Product
        </h2>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- ️ Warning Message + Invalid List --}}
        @if(session('warning'))
            <div class="mb-4 p-3 bg-yellow-100 border border-yellow-400 text-yellow-700 rounded-lg">
                ️ {{ session('warning') }}

                {{-- invalid serial number গুলো দেখাও --}}
                @if(session('invalid_serials'))
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach(session('invalid_serials') as $serial)
                            <li>
                                <span class="font-mono font-bold">{{ $serial }}</span>
                                — Not found in stocks table.
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endif

        {{--  Error Message + Invalid List --}}
        @if(session('error'))
            <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                 {{ session('error') }}

                @if(session('invalid_serials'))
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach(session('invalid_serials') as $serial)
                            <li>
                                <span class="font-mono font-bold">{{ $serial }}</span>
                                — Not found in stocks table.
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endif

        <form action="{{ route('orders.sale.store', $orderDetail->id) }}" method="POST">
            @csrf
            <input type="hidden" name="orderDetailId" value="{{ $orderDetail->id }}">

            @for ($i = 0; $i < $orderDetail->product_quantity; $i++)
                <div class="grid grid-cols-2 gap-4 mb-3 border p-3 rounded-lg">

                    {{-- Product Name --}}
                    <div>
                        <label class="text-sm text-gray-500">Product Name</label>
                        <input type="text"
                               value="{{ $orderDetail->product->name }}"
                               class="w-full border rounded px-3 py-2 bg-gray-100"
                               readonly>
                    </div>

                    {{-- Enter serial number --}}
                    <div>
                        <label class="text-sm text-gray-500">Serial Number</label>
                        <input type="text"
                               name="serial_id[]"
                               class="w-full border rounded px-3 py-2"
                               placeholder="Enter Serial id... ">
                    </div>

                </div>
            @endfor

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
                Upload Product
            </button>
        </form>

    </div>
</x-app-layout>
