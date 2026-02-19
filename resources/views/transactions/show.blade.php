<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Transaction ID</label>
                            <p class="mt-1 text-gray-900">#{{ $transaction->id }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Date</label>
                            <p class="mt-1 text-gray-900">{{ $transaction->transaction_date->format('d M Y') }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Product</label>
                            <p class="mt-1 text-gray-900">{{ $transaction->product->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Type</label>
                            <p class="mt-1">
                                <span class="px-2 py-1 text-xs rounded {{ $transaction->type === 'in' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ strtoupper($transaction->type) }}
                                </span>
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Quantity</label>
                            <p class="mt-1 text-gray-900">{{ $transaction->quantity }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Created By</label>
                            <p class="mt-1 text-gray-900">{{ $transaction->user->name }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700">Notes</label>
                        <p class="mt-1 text-gray-900">{{ $transaction->notes ?: '-' }}</p>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('transactions.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>