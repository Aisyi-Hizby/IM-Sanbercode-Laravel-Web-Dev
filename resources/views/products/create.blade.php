<x-app-layout>
    <x-slot name="header">
        Add Product
    </x-slot>

    <div class="bg-white rounded-xl shadow-sm max-w-2xl mx-auto">
        <div class="p-6 border-b border-gray-100">
            <h3 class="text-lg font-semibold text-gray-800">Create New Product</h3>
        </div>
        
        <div class="p-6">
            {{-- Debug: Hapus setelah fix --}}
            @if(!isset($categories))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                    <p><strong>Error:</strong> Variable $categories tidak dikirim ke view!</p>
                </div>
            @elseif($categories->isEmpty())
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4">
                    <p><strong>Warning:</strong> Tidak ada category di database. <a href="{{ route('categories.create') }}" class="underline">Buat category dulu</a></p>
                </div>
            @endif

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Product Name -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Product Name *</label>
                    <input type="text" name="name" value="{{ old('name') }}" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category Select -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                    <select name="category_id" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                        required>
                        <option value="">-- Pilih Category --</option>
                        @isset($categories)
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        @endisset
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" rows="3" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price & Stock -->
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Price (Rp) *</label>
                        <input type="number" name="price" value="{{ old('price') }}" step="0.01" min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        @error('price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Stock *</label>
                        <input type="number" name="stock" value="{{ old('stock', 0) }}" min="0"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        @error('stock')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Image -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Product Image</label>
                    <input type="file" name="image" accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <p class="text-gray-500 text-sm mt-1">Format: JPG, PNG, GIF. Max: 2MB</p>
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                        Create Product
                    </button>
                    <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-gray-800">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>