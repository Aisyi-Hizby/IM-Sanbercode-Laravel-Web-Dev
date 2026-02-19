<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('transactions.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Product</label>
                            <select name="product_id" class="shadow border rounded w-full py-2 px-3" required>
                                <option value="">Select Product</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ request('product_id') == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }} (Stock: {{ $product->stock }})
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Transaction Type</label>
                            <select name="type" class="shadow border rounded w-full py-2 px-3" required>
                                <option value="in">Stock In (Masuk)</option>
                                <option value="out">Stock Out (Keluar)</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Quantity</label>
                            <input type="number" name="quantity" min="1" value="{{ old('quantity', 1) }}" class="shadow appearance-none border rounded w-full py-2 px-3" required>
                            @error('quantity')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Transaction Date</label>
                            <input type="date" name="transaction_date" value="{{ old('transaction_date', date('Y-m-d')) }}" class="shadow appearance-none border rounded w-full py-2 px-3" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Notes</label>
                            <textarea name="notes" class="shadow appearance-none border rounded w-full py-2 px-3" rows="3">{{ old('notes') }}</textarea>
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Create Transaction
                            </button>
                            <a href="{{ route('transactions.index') }}" class="text-gray-600 hover:text-gray-800">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>