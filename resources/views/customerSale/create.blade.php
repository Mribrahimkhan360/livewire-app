<x-app-layout>

    <div class="min-h-screen bg-gray-50 py-10 px-4">
        <div class="max-w-2xl mx-auto">

            {{-- Page Header --}}
            <div class="flex items-center gap-4 mb-8">
                <div class="w-11 h-11 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6h13"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-semibold text-slate-500 tracking-tight">Customer Sale</h1>
                    <p class="text-xs text-slate-500 mt-0.5">Assign products to a customer</p>
                </div>
            </div>

            {{-- Alerts --}}
            @if(session('error'))
                <div class="flex items-center gap-3 border border-red-200 text-red-400 text-sm font-medium px-4 py-3 rounded-xl mb-4">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="flex items-center gap-3 bg-emerald-100 border border-emerald-300 text-emerald-700 text-sm font-medium px-4 py-3 rounded-xl mb-4">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('customerSale.store') }}" method="POST">
                @csrf
                {{-- Customer Card --}}
                <div class="bg-gray-100 border border-slate-200 rounded-2xl p-6 mb-4">
                    <p class="text-[10px] font-semibold text-slate-600 uppercase tracking-widest mb-4 flex items-center gap-2 after:flex-1 after:h-px after:bg-slate-300">
                        Customer
                    </p>

                    <label class="block text-[11px] font-medium text-gray-100 uppercase tracking-wider mb-2">
                        Select User
                    </label>
                    <div class="relative">
                        <select name="user_id"
                                class="w-full bg-gray-100 border border-slate-300 rounded-xl px-4 py-2.5 text-sm text-slate-300 appearance-none outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition cursor-pointer pr-10">
                            <option value="">— Choose a user —</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-500 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>

                {{-- Products Card --}}
                <div class="bg-gray-100 border border-slate-200 rounded-2xl p-6 mb-4">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-[10px] font-semibold text-slate-600 uppercase tracking-widest">
                            Products
                        </p>
                        <span id="product-count"
                              class="text-[11px] text-indigo-400 bg-indigo-100 border border-indigo-100 px-2.5 py-0.5 rounded-full font-medium tabular-nums">
                            1 item
                        </span>
                    </div>

                    {{-- Product Rows --}}
                    <div id="product-container" class="space-y-2">
                        {{-- First Row (no remove button) --}}
                        <div class="product-row flex items-center gap-2">
                            <span class="text-[11px] text-slate-700 font-mono w-5 text-center shrink-0">1</span>
                            <input type="text" name="serial_number[]" placeholder="Enter serial number"
                                   class="flex-1 bg-gray-100 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-300 font-mono placeholder:text-slate-700 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition"/>
                            <div class="w-8 shrink-0"></div>
                        </div>
                    </div>

                    {{-- Add Row Button --}}
                    <button type="button" onclick="addRow()"
                            class="mt-3 w-full flex items-center justify-center gap-2 border border-dashed border-slate-700 hover:border-indigo-500 hover:text-indigo-400 text-slate-600 text-sm rounded-xl py-2.5 transition-all duration-150 group">
                        <svg class="w-4 h-4 group-hover:rotate-90 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                        Add Product
                    </button>
                </div>

                {{-- Footer Actions --}}
                <div class="flex items-center justify-between pt-2">
                    <a href="{{ url()->previous() }}"
                       class="text-sm text-slate-500 hover:text-slate-300 transition flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Cancel
                    </a>

                    <button type="submit"
                            class="flex items-center gap-2 bg-indigo-600 hover:bg-indigo-500 active:scale-95 text-white text-sm font-medium px-6 py-2.5 rounded-xl transition-all duration-150 shadow-lg shadow-indigo-900/40">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        Confirm Sale
                    </button>
                </div>

            </form>
        </div>
    </div>

    <script>
        let rowCount = 1;

        function updateCount() {
            const rows = document.querySelectorAll('.product-row').length;
            rowCount = rows;
            const el = document.getElementById('product-count');
            el.textContent = rows + (rows === 1 ? ' item' : ' items');
        }

        function addRow() {
            const container = document.getElementById('product-container');
            const newIndex = document.querySelectorAll('.product-row').length + 1;

            const div = document.createElement('div');
            div.className = 'product-row flex items-center gap-2 animate-fade-in';
            div.innerHTML = `
                <span class="text-[11px] text-slate-700 font-mono w-5 text-center shrink-0">${newIndex}</span>
                <input type="text" name="serial_number[]" placeholder="Enter serial number"
                    class="flex-1 bg-slate-200 border border-slate-200 rounded-xl px-4 py-2.5 text-sm text-slate-300 font-mono placeholder:text-slate-700 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition"/>
                <button type="button" onclick="removeRow(this)"
                    class="w-8 h-8 shrink-0 flex items-center justify-center rounded-lg border border-slate-800 text-slate-600 hover:border-red-900 hover:bg-red-950 hover:text-red-400 transition-all duration-150">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            `;
            container.appendChild(div);
            updateCount();
            div.querySelector('input').focus();
        }

        function removeRow(btn) {
            btn.closest('.product-row').remove();
            reindex();
            updateCount();
        }

        function reindex() {
            document.querySelectorAll('.product-row').forEach((row, i) => {
                const num = row.querySelector('span');
                if (num) num.textContent = i + 1;
            });
        }
    </script>

</x-app-layout>
