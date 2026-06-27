@extends('layouts.admin')

@section('title', 'Laporan Transaksi - Admin')

@section('content')
    <!-- Header -->
    <header class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-3xl font-black">Laporan Transaksi</h1>
            <p class="text-slate-500 font-medium">Pantau arus kas dan penjualan tiket Anda.</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="px-4 py-2 bg-white border border-slate-200 rounded-2xl text-sm font-bold text-slate-500">
                <i class="fa-regular fa-calendar mr-2"></i>
                {{ now()->format('d M Y') }}
            </div>
        </div>
    </header>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <!-- Total Transaksi -->
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center">
                    <i class="fa-solid fa-receipt text-xl"></i>
                </div>
                <span class="text-[10px] font-black uppercase tracking-widest text-slate-300">All Time</span>
            </div>
            <p class="text-slate-400 text-xs font-bold uppercase tracking-wide mb-1">Total Pesanan</p>
            <h3 class="text-2xl font-black">{{ number_format($totalTransactions) }} <span class="text-sm font-bold text-slate-400">Pesanan</span></h3>
        </div>

        <!-- Total Pendapatan -->
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center">
                    <i class="fa-solid fa-wallet text-xl"></i>
                </div>
                <span class="text-[10px] font-black uppercase tracking-widest text-slate-300">Revenue</span>
            </div>
            <p class="text-slate-400 text-xs font-bold uppercase tracking-wide mb-1">Total Pendapatan</p>
            <h3 class="text-2xl font-black">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h3>
        </div>

        <!-- Transaksi Sukses -->
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center">
                    <i class="fa-solid fa-circle-check text-xl"></i>
                </div>
                <span class="text-[10px] font-black uppercase tracking-widest text-slate-300">Completed</span>
            </div>
            <p class="text-slate-400 text-xs font-bold uppercase tracking-wide mb-1">Transaksi Sukses</p>
            <h3 class="text-2xl font-black">{{ number_format($successCount) }} <span class="text-sm font-bold text-slate-400">Lunas</span></h3>
        </div>

        <!-- Transaksi Pending -->
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center">
                    <i class="fa-solid fa-clock text-xl"></i>
                </div>
                <span class="text-[10px] font-black uppercase tracking-widest text-slate-300">Waiting</span>
            </div>
            <p class="text-slate-400 text-xs font-bold uppercase tracking-wide mb-1">Menunggu Pembayaran</p>
            <h3 class="text-2xl font-black">{{ number_format($pendingCount) }} <span class="text-sm font-bold text-slate-400">Pending</span></h3>
        </div>
    </div>

    <!-- Transaction Table -->
    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-8 border-b flex justify-between items-center">
            <div>
                <h3 class="font-black text-xl">Riwayat Transaksi</h3>
                <p class="text-slate-400 text-sm mt-1">Menampilkan {{ $transactions->count() }} dari {{ $transactions->total() }} transaksi</p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                    <tr>
                        <th class="px-8 py-4">Order ID</th>
                        <th class="px-8 py-4">Detail Pembeli</th>
                        <th class="px-8 py-4">Event</th>
                        <th class="px-8 py-4">Tgl Transaksi</th>
                        <th class="px-8 py-4">Status</th>
                        <th class="px-8 py-4 text-right">Total Tagihan</th>
                    </tr>
                </thead>
                <tbody class="divide-y border-t">
                    @forelse($transactions as $trx)
                        <tr class="hover:bg-slate-50/50 transition {{ $trx->status == 'pending' || $trx->status == 'Pending' ? 'text-slate-400' : '' }}">
                            <td class="px-8 py-6">
                                <span class="font-mono font-bold px-3 py-1 rounded-lg text-sm {{ $trx->status == 'pending' || $trx->status == 'Pending' ? 'bg-slate-100' : 'text-indigo-600 bg-indigo-50' }}">
                                    {{ $trx->order_id }}
                                </span>
                            </td>
                            <td class="px-8 py-6">
                                <p class="font-bold text-slate-800">{{ $trx->customer_name }}</p>
                                <p class="text-xs text-slate-500">{{ $trx->customer_email }}<br>{{ $trx->customer_phone }}</p>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-3">
                                    <img src="{{ ($trx->event && $trx->event->poster_path && Storage::disk('public')->exists($trx->event->poster_path))
                                        ? asset('storage/' . $trx->event->poster_path)
                                        : 'https://placehold.co/80x80' }}"
                                        alt="Event" class="w-10 h-10 rounded-xl object-cover border border-slate-100">
                                    <p class="font-medium text-slate-700">{{ $trx->event->title ?? '-' }}</p>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-sm text-slate-500">
                                {{ $trx->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="px-8 py-6">
                                @if($trx->status === 'settlement' || $trx->status === 'success')
                                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-bold uppercase ring-1 ring-green-200">Success</span>
                                @elseif($trx->status === 'pending' || $trx->status === 'Pending')
                                    <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-lg text-xs font-bold uppercase ring-1 ring-orange-200">Pending</span>
                                @else
                                    <span class="px-3 py-1 bg-rose-100 text-rose-700 rounded-lg text-xs font-bold uppercase ring-1 ring-rose-200">{{ $trx->status }}</span>
                                @endif
                            </td>
                            <td class="px-8 py-6 text-right font-black {{ $trx->status == 'pending' || $trx->status == 'Pending' ? '' : 'text-slate-900' }}">
                                Rp {{ number_format($trx->total_price, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-8 py-16 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center mb-4">
                                        <i class="fa-solid fa-inbox text-2xl text-slate-300"></i>
                                    </div>
                                    <p class="font-bold text-slate-400">Belum ada transaksi</p>
                                    <p class="text-sm text-slate-300 mt-1">Transaksi akan muncul setelah pelanggan melakukan checkout.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($transactions->hasPages())
            <div class="px-8 py-6 bg-slate-50/50 border-t">
                {{ $transactions->links() }}
            </div>
        @endif
    </div>
@endsection
