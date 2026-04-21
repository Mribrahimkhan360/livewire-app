<x-app-layout>
    {{-- Header --}}
    <div class="page-header flex items-center justify-between mb-4">
        <div>
            <h1 class="page-title text-xl font-bold">Users</h1>
            <p class="page-subtitle text-gray-500">Manage accounts and roles</p>
        </div>

        <a href="{{ route('userMapping.create') }}"
           class="inline-flex items-center gap-2 bg-brand-600 hover:bg-brand-700 text-gray-500 text-sm font-semibold px-4 py-2.5 rounded-xl shadow-md shadow-brand-600/30 transition-all duration-200 hover:scale-105">
            + User Mapping
        </a>
    </div>

    <div class="overflow-x-auto bg-white rounded-2xl shadow">
        <table class="min-w-full text-sm text-gray-700">

            <!-- Header -->
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs tracking-wider">
            <tr>
                <th class="px-5 py-3 text-left">SL</th>
                <th class="px-5 py-3 text-left">Distributor ID</th>
                <th class="px-5 py-3 text-left">Customer ID</th>
                <th class="px-5 py-3 text-left">Status</th>
            </tr>
            </thead>

            <!-- Body -->
            <tbody class="divide-y divide-gray-200">


            @foreach($mappings as $key => $mapping)
                <tr class="hover:bg-blue-50 transition duration-200">
                    <td class="px-5 py-3 font-medium">
                        {{ $key + 1 }}
                    </td>
                    <td class="px-5 py-3 font-semibold text-gray-800">
                        {{ $mapping['distributor_id'] }}
                    </td>

                    <td class="px-5 py-3 font-semibold text-gray-800">
                        {{ $mapping['customer_id'] }}
                    </td>

                    <td class="px-5 py-3">
                        @if($mapping['status'] == 'active')
                            <span class="bg-green-100 text-green-600 px-2 py-1 rounded-lg text-xs font-semibold">
                                    Active
                                </span>
                        @else
                            <span class="bg-red-100 text-red-600 px-2 py-1 rounded-lg text-xs font-semibold">
                                    Inactive
                                </span>
                        @endif
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</x-app-layout>
