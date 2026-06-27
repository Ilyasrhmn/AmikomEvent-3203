<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        // Mengambil transaksi terbaru dengan pembatasan 20 baris/halaman
        $transactions = Transaction::with('event')->latest()->paginate(20);

        // Statistik ringkasan untuk summary cards
        $totalTransactions = Transaction::count();
        $totalRevenue = Transaction::whereIn('status', ['settlement', 'success'])->sum('total_price');
        $successCount = Transaction::whereIn('status', ['settlement', 'success'])->count();
        $pendingCount = Transaction::where('status', 'Pending')->orWhere('status', 'pending')->count();

        return view('admin.transactions.index', compact(
            'transactions', 'totalTransactions', 'totalRevenue', 'successCount', 'pendingCount'
        ));
    }
}
