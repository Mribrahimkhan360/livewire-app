<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-8 px-4">
        <div class="max-w-2xl mx-auto">

            <h1 class="text-3xl font-bold mb-6">Customer Sale</h1>
            @if(session('error'))
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4 mt-5">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('customerSale.store') }}" method="POST">
                @csrf

                {{-- User Select --}}
                <div class="mb-4">
                    <label class="text-sm">User</label>
                    <select name="user_id" class="w-full border p-2 rounded">
                        <option value="">Select User</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Product Container --}}
                <div id="product-container">
                    <div class="product-row mb-2">
                        <input type="text" name="serial_number[]" placeholder="Serial Number"
                               class="w-full border p-2 rounded"/>
                    </div>
                </div>

                {{-- Add Button --}}
                <button type="button" onclick="addRow()"
                        class="bg-blue-500 text-white px-4 py-2 rounded mt-2">
                    + Add Product
                </button>

                <br><br>

                {{-- Submit --}}
                <button type="submit"
                        class="bg-green-500 text-white px-6 py-2 rounded">
                    Submit
                </button>
            </form>


        </div>
    </div>

    <script>
        function addRow() {
            let container = document.getElementById('product-container');

            let html = `
                <div class="product-row mb-2 flex gap-2">
                    <input type="text" name="serial_number[]" placeholder="Serial Number"
                        class="w-full border p-2 rounded"/>

                    <button type="button" onclick="removeRow(this)"
                        class="bg-red-500 text-white px-3 rounded">X</button>
                </div>
            `;

            container.insertAdjacentHTML('beforeend', html);
        }

        function removeRow(btn) {
            btn.parentElement.remove();
        }
    </script>

</x-app-layout>
