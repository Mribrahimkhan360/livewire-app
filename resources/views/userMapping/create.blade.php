<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-10 px-4">
        <div class="max-w-2xl mx-auto">
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

            <form action="{{ route('userMapping.store') }}" method="POST">
                @csrf

                {{-- Distributor Card --}}
                <div class="bg-gray-100 border border-slate-200 rounded-2xl p-6 mb-4">
                    <p class="text-[10px] font-semibold text-slate-600 uppercase tracking-widest mb-4 flex items-center gap-2 after:flex-1 after:h-px after:bg-slate-300">
                        Distributor
                    </p>

                    <label class="block text-[11px] font-medium text-gray-100 uppercase tracking-wider mb-2">
                        Select Distributor
                    </label>
                    <div class="relative">
                        <select name="distributor_id"
                                class="w-full bg-gray-100 border border-slate-300 rounded-xl px-4 py-2.5 text-sm text-slate-600 appearance-none outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition cursor-pointer pr-10">
                            <option value="">— Choose a user —</option>
                            @foreach($userDistributors as $userDistributor)
                                <option value="{{ $userDistributor->id }}" class="text-gray-600">{{ $userDistributor->name }}</option>
                            @endforeach
                        </select>
                        <svg
                            class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-500 pointer-events-none"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>


                {{-- Distributor Card --}}
                <div class="bg-gray-100 border border-slate-200 rounded-2xl p-6 mb-4">
                    <p class="text-[10px] font-semibold text-slate-600 uppercase tracking-widest mb-4 flex items-center gap-2 after:flex-1 after:h-px after:bg-slate-300">
                        Customer
                    </p>

                    <label class="block text-[11px] font-medium text-gray-100 uppercase tracking-wider mb-2">
                        Select Customer
                    </label>
                    <div class="relative">
                        <select name="customer_id"
                                class="w-full bg-gray-100 border border-slate-300 rounded-xl px-4 py-2.5 text-sm text-slate-600 appearance-none outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition cursor-pointer pr-10">
                            <option value="">— Choose a user —</option>

                            @foreach($userCustomers as $userCustomer)
                                <option value="{{ $userCustomer->id }}" class="text-gray-600">{{ $userCustomer->name }}</option>
                            @endforeach
                        </select>
                        <svg
                            class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-500 pointer-events-none"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
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
                        Create Map
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
