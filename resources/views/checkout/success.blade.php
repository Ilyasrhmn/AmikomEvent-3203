@extends('layouts.app')

@section('title', 'Pembayaran Berhasil - ' . $transaction->order_id)

@section('content')
<main class="max-w-2xl mx-auto px-6 py-20">

    <!-- Success Alert -->
    <div class="mb-8 p-5 bg-green-50 border border-green-200 rounded-2xl flex items-center gap-4">
        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <div>
            <p class="font-bold text-green-800">Pesanan Berhasil Dibuat!</p>
            <p class="text-sm text-green-600">Tiket Anda telah tercatat. Silakan lakukan pembayaran sesuai instruksi.</p>
        </div>
    </div>

    <!-- Ticket Card -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        
        <!-- Header -->
        <div class="bg-indigo-600 px-8 py-6 text-white">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-indigo-200 text-xs font-bold uppercase tracking-widest mb-1">E-Ticket</p>
                    <h2 class="text-2xl font-black">{{ $transaction->event->title }}</h2>
                </div>
                <div class="text-right">
                    <p class="text-indigo-200 text-xs font-bold uppercase tracking-widest mb-1">Order ID</p>
                    <p class="font-mono font-bold text-sm">{{ $transaction->order_id }}</p>
                </div>
            </div>
        </div>

        <!-- Dashed Separator -->
        <div class="relative">
            <div class="absolute -left-4 -top-4 w-8 h-8 bg-slate-50 rounded-full"></div>
            <div class="absolute -right-4 -top-4 w-8 h-8 bg-slate-50 rounded-full"></div>
            <div class="border-t-2 border-dashed border-slate-200 mx-8"></div>
        </div>

        <!-- Ticket Body -->
        <div class="p-8">

            <!-- Event Info -->
            <div class="flex gap-5 items-start mb-8">
                <img src="{{ ($transaction->event->poster_path && Storage::disk('public')->exists($transaction->event->poster_path))
                    ? asset('storage/' . $transaction->event->poster_path)
                    : 'https://placehold.co/200x200' }}"
                    alt="Event Poster" class="w-20 h-20 rounded-2xl object-cover border border-slate-100">
                <div>
                    <h3 class="font-extrabold text-lg">{{ $transaction->event->title }}</h3>
                    <p class="text-slate-500 text-sm">{{ $transaction->event->date->format('d M Y, H:i') }} WIB</p>
                    <p class="text-slate-500 text-sm">📍 {{ $transaction->event->location }}</p>
                </div>
            </div>

            <!-- Customer Info Grid -->
            <div class="grid grid-cols-2 gap-y-5 gap-x-8 mb-8">
                <div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Nama Pemesan</p>
                    <p class="font-bold text-slate-800">{{ $transaction->customer_name }}</p>
                </div>
                <div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Email</p>
                    <p class="font-bold text-slate-800">{{ $transaction->customer_email }}</p>
                </div>
                <div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">No. WhatsApp</p>
                    <p class="font-bold text-slate-800">{{ $transaction->customer_phone }}</p>
                </div>
                <div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-1">Status</p>
                    @if($transaction->status === 'settlement' || $transaction->status === 'success')
                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-bold uppercase ring-1 ring-green-200">Success</span>
                    @else
                        <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-lg text-xs font-bold uppercase ring-1 ring-orange-200">Pending</span>
                    @endif
                </div>
            </div>

            <!-- Price Breakdown -->
            <div class="bg-slate-50 rounded-2xl p-5 mb-8">
                <div class="flex justify-between text-sm text-slate-500 mb-2">
                    <span>Harga Tiket (1x)</span>
                    <span>Rp {{ number_format($transaction->event->price, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-sm text-slate-500 mb-3">
                    <span>Biaya Layanan</span>
                    <span>Rp 5.000</span>
                </div>
                <div class="border-t border-slate-200 pt-3 flex justify-between">
                    <span class="font-black text-lg">Total Bayar</span>
                    <span class="font-black text-lg text-indigo-600">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- QR Code -->
            <div class="flex flex-col items-center py-6 border-t border-dashed border-slate-200">
                <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mb-4">Scan QR untuk Verifikasi</p>
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data={{ urlencode($transaction->order_id) }}" 
                     alt="QR Code" class="w-44 h-44 rounded-xl border-4 border-white shadow-lg">
                <p class="font-mono text-sm font-bold text-indigo-600 mt-4">{{ $transaction->order_id }}</p>
                <p class="text-xs text-slate-400 mt-1">Tunjukkan QR ini saat memasuki venue</p>
            </div>

        </div>
    </div>

    <!-- Actions -->
    <div class="mt-8 flex gap-4">
        <a href="{{ route('home') }}" 
           class="flex-1 py-4 bg-indigo-600 text-white rounded-2xl font-bold text-center shadow-lg shadow-indigo-200 hover:bg-indigo-700 active:scale-95 transition-all">
            Kembali ke Beranda
        </a>
    </div>

    <p class="text-center text-xs text-slate-400 mt-4">E-Ticket juga akan dikirimkan ke email <strong>{{ $transaction->customer_email }}</strong></p>

</main>
@endsection
