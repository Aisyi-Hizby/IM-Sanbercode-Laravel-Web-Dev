<x-app-layout>
    <x-slot name="header">
        Categories
    </x-slot>

    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-800">Category List</h3>
            @if(auth()->user()->hasRole('admin'))
            <a href="{{ route('categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Add Category
            </a>
            @endif
        </div>

        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Products Count</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($categories as $category)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $category->name }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ Str::limit($category->description, 50) }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs">
                                    {{ $category->products_count }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <a href="{{ route('categories.show', $category) }}" class="text-blue-600 hover:text-blue-900">View</a>
                                    @if(auth()->user()->hasRole('admin'))
                                    <a href="{{ route('categories.edit', $category) }}" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
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
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</x-app-layout>