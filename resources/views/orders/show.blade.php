<x-app-layout>

<div class="min-h-screen bg-gray-50 py-8 px-4">
    <div class="max-w-2xl mx-auto">

        {{-- Header --}}
        <div class="mb-8">
            <a href="{{ route('orders.index') }}"
               class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-gray-700 mb-4 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Back to Orders
            </a>
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">
                        Order <span class="font-mono text-indigo-600">#{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span>
                    </h1>
                    <p class="text-gray-500 mt-1">Placed on {{ $order->created_at->format('d M Y, h:i A') }}</p>
                </div>

                {{-- Status Badge --}}
                @php
                    $statusClasses = [
                        'pending'   => 'bg-yellow-100 text-yellow-700 border border-yellow-200',
                        'confirmed' => 'bg-green-100 text-green-700 border border-green-200',
                        'cancelled' => 'bg-red-100 text-red-700 border border-red-200',
                    ];
                    $badgeClass = $statusClasses[$order->order_status] ?? 'bg-gray-100 text-gray-600';
                @endphp
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold capitalize {{ $badgeClass }}">
                    {{ $order->order_status }}
                </span>
            </div>
        </div>

        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="mb-6 flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl">
                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="space-y-5">

            {{-- Order Info Card --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Order Info</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-50 rounded-xl p-4">
                        <p class="text-xs text-gray-400 mb-1">Placed By</p>
                        <p class="text-sm font-semibold text-gray-800">{{ $order->user->name }}</p>
                        <p class="text-xs text-gray-500">{{ $order->user->email }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <p class="text-xs text-gray-400 mb-1">Summary</p>
                        <p class="text-sm font-semibold text-gray-800">{{ $order->total_products }} Product(s)</p>
                        <p class="text-xs text-gray-500">{{ $order->total_quantity }} Total Qty</p>
                    </div>
                </div>
            </div>

            {{-- Products Card --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100">
                    <h2 class="text-sm font-semibold text-gray-700">
                        Products
                        <span class="ml-1.5 text-xs font-medium text-gray-400 bg-gray-100 px-2 py-0.5 rounded-full">
                            {{ $order->orderDetails->count() }}
                        </span>
                    </h2>
                </div>

                @if($order->orderDetails->isEmpty())
                    <div class="text-center py-10 text-gray-400 text-sm">
                        No products found in this order.
                    </div>
                @else
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-100 text-gray-400 uppercase text-xs tracking-wider">
                                <th class="text-left px-6 py-3">#</th>
                                <th class="text-left px-6 py-3">Product Name</th>
                                <th class="text-right px-6 py-3">Quantity</th>
                                @can('upload_button')
                                <th class="text-right px-6 py-3">Action</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach($order->orderDetails as $index => $detail)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-3.5 text-gray-400 font-medium">{{ $index + 1 }}</td>
                                    <td class="px-6 py-3.5">
                                        <span class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-indigo-400 flex-shrink-0"></span>
                                            <span class="text-gray-800 font-medium">
                                                {{ $detail->product->name }}
                                            </span>
                                        </span>
                                    </td>
                                    <td class="px-6 py-3.5 text-right">
                                        <span class="inline-flex items-center gap-1 bg-indigo-50 text-indigo-700
                                                     text-xs font-semibold px-2.5 py-1 rounded-full">
                                            × {{ $detail->product_quantity }}
                                        </span>
                                    </td>

                                    @can('upload_button')
                                    <td class="px-6 py-3.5 text-right">
                                        <a href="{{ route('orders.sale', $detail->id) }}"
                                           class="inline-flex items-center justify-center w-8 h-8 rounded-full
   bg-green-50 text-green-600 hover:bg-green-100 transition">

                                            <!-- Upload Icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 class="w-4 h-4"
                                                 viewBox="0 0 24 24"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 stroke-width="2"
                                                 stroke-linecap="round"
                                                 stroke-linejoin="round">

                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                                <polyline points="17 8 12 3 7 8"/>
                                                <line x1="12" y1="3" x2="12" y2="15"/>
                                            </svg>
                                        </a>                                    </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="bg-gray-50 border-t border-gray-200">
                                <td colspan="2" class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Total Quantity
                                </td>
                                <td class="px-6 py-3 text-right text-sm font-bold text-gray-800">
                                    {{ $order->total_quantity }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                @endif
            </div>

            {{-- Action Buttons --}}
            <div class="flex items-center gap-4">
                {{-- Confirm Button --}}
                <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status" value="confirmed">
                    <button type="submit"
                            class="px-4 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 transition">
                        Order Confirm
                    </button>
                </form>

                {{-- Cancel Button --}}
                <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status" value="cancelled">
                    <button type="submit"
                            class="px-4 py-2 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 transition">
                        Order Cancel
                    </button>
                </form>

{{--                <form action="{{ route('orders.sale')}}" method="POST">--}}
{{--                    @csrf--}}

{{--                    <button type="submit"--}}
{{--                            class="px-4 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 transition ml-2">--}}
{{--                        Upload Product--}}
{{--                    </button>--}}
{{--                </form>--}}
            </div>

        </div>
    </div>
</div>
</x-app-layout>

