<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Category: {{ $category->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-2">{{ $category->name }}</h3>
                    <p class="text-gray-600">{{ $category->description }}</p>
                </div>
            </div>

            <h3 class="text-xl font-semibold mb-4">Products in this Category</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($category->products as $product)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">No Image</div>
                    @endif
                    <div class="p-4">
                        <h4 class="font-semibold text-lg">{{ $product->name }}</h4>
                        <p class="text-gray-600">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="text-sm text-gray-500">Stock: {{ $product->stock }}</p>
                        <a href="{{ route('products.show', $product) }}" class="mt-2 inline-block text-blue-600 hover:text-blue-900">View Details →</a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center text-gray-500 py-8">
                    No products in this category yet.
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>