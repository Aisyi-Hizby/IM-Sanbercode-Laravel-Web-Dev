<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-96 object-cover rounded-lg">
                            @else
                                <div class="w-full h-96 bg-gray-200 rounded-lg flex items-center justify-center">No Image</div>
                            @endif
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold mb-4">{{ $product->name }}</h3>
                            <p class="text-gray-600 mb-2"><strong>Category:</strong> {{ $product->category->name }}</p>
                            <p class="text-gray-600 mb-2"><strong>Price:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <p class="text-gray-600 mb-4"><strong>Stock:</strong> {{ $product->stock }}</p>
                            <p class="text-gray-700 mb-6">{{ $product->description }}</p>

                            @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('staff'))
                            <a href="{{ route('transactions.create', ['product_id' => $product->id]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Add Transaction
                            </a>
                            @endif
                        </div>
                    </div>

                    <!-- Transaction History -->
                    <div class="mt-8">
                        <h4 class="text-lg font-semibold mb-4">Transaction History</h4>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantity</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($product->transactions as $transaction)
                                <tr>
                                    <td class="px-6 py-4">{{ $transaction->transaction_date->format('d M Y') }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 text-xs rounded {{ $transaction->type === 'in' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ strtoupper($transaction->type) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">{{ $transaction->quantity }}</td>
                                    <td class="px-6 py-4">{{ $transaction->user->name }}</td>
                                    <td class="px-6 py-4">{{ $transaction->notes }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">No transactions yet</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>