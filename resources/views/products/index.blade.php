<x-app-layout>
    <x-slot name="header">
        Products
    </x-slot>

    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-800">Product List</h3>
            @if(auth()->user()->hasRole('admin'))
            <a href="{{ route('products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Add Product
            </a>
            @endif
        </div>
        
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stock</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($products as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" class="h-12 w-12 object-cover rounded-lg">
                                @else
                                    <div class="h-12 w-12 bg-gray-200 rounded-lg flex items-center justify-center text-xs text-gray-500">No Image</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $product->name }}</td>
                            <td class="px-6 py-4"><span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs">{{ $product->category->name }}</span></td>
                            <td class="px-6 py-4">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 {{ $product->stock > 10 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }} rounded-full text-xs">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <a href="{{ route('products.show', $product) }}" class="text-blue-600 hover:text-blue-900">View</a>
                                    @if(auth()->user()->hasRole('admin'))
                                    <a href="{{ route('products.edit', $product) }}" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout>