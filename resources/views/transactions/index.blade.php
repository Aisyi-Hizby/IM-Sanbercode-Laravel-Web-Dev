<x-app-layout>
    <x-slot name="header">
        Transactions
    </x-slot>

    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-800">Transaction List</h3>
            <a href="{{ route('transactions.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                New Transaction
            </a>
        </div>

        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Product</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantity</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($transactions as $transaction)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $transaction->transaction_date->format('d M Y') }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $transaction->product->name }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs rounded {{ $transaction->type === 'in' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ strtoupper($transaction->type) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">{{ $transaction->quantity }}</td>
                            <td class="px-6 py-4">{{ $transaction->user->name }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('transactions.show', $transaction) }}" class="text-blue-600 hover:text-blue-900">View</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                No transactions found. 
                                <a href="{{ route('transactions.create') }}" class="text-blue-600 hover:underline">Create one</a>.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $transactions->links() }}
            </div>
        </div>
    </div>
</x-app-layout>