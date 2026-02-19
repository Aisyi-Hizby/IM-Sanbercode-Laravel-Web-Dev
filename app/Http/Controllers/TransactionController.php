<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['product', 'user'])
            ->latest()
            ->paginate(15);
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all();
        return view('transactions.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string',
            'transaction_date' => 'required|date'
        ]);

        $validated['user_id'] = auth()->id();

        DB::transaction(function () use ($validated) {
            $transaction = Transaction::create($validated);
            
            $product = Product::find($validated['product_id']);
            
            if ($validated['type'] === 'in') {
                $product->increment('stock', $validated['quantity']);
            } else {
                if ($product->stock < $validated['quantity']) {
                    throw new \Exception('Insufficient stock');
                }
                $product->decrement('stock', $validated['quantity']);
            }
        });

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction created successfully.');
    }

    public function show(Transaction $transaction)
    {
        $transaction->load(['product', 'user']);
        return view('transactions.show', compact('transaction'));
    }
}