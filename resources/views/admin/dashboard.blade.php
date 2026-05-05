@extends('layouts.admin')

@section('content')
    <!-- Header -->
    <header class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-3xl font-black">Dashboard Ringkasan</h1>
            <p class="text-slate-500 font-medium">Selamat datang kembali, Admin!</p>
        </div>
        <div class="flex items-center gap-4">
            <div class="text-right hidden md:block">
                <p class="font-bold">Admin Super</p>
                <p class="text-xs text-slate-400">Penyelenggara Utama</p>
            </div>
            <div class="w-12 h-12 bg-white rounded-2xl shadow-sm border flex items-center justify-center p-1">
                <img src="https://ui-avatars.com/api/?name=Admin+Super&background=6366f1&color=fff"
                    class="rounded-xl">
            </div>
        </div>
    </header>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
            <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-4">
                <i class="fa-solid fa-wallet text-2xl"></i>
            </div>
            <p class="text-slate-400 text-sm font-bold uppercase mb-1">Total Pendapatan</p>
            <h3 class="text-2xl font-black">Rp 12.450.000</h3>
        </div>
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
            <div class="w-12 h-12 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center mb-4">
                <i class="fa-solid fa-ticket text-2xl"></i>
            </div>
            <p class="text-slate-400 text-sm font-bold uppercase mb-1">Tiket Terjual</p>
            <h3 class="text-2xl font-black">1.284</h3>
        </div>
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
            <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center mb-4">
                <i class="fa-solid fa-calendar-check text-2xl"></i>
            </div>
            <p class="text-slate-400 text-sm font-bold uppercase mb-1">Event Aktif</p>
            <h3 class="text-2xl font-black">8 Event</h3>
        </div>
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
            <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-2xl flex items-center justify-center mb-4">
                <i class="fa-solid fa-clock text-2xl"></i>
            </div>
            <p class="text-slate-400 text-sm font-bold uppercase mb-1">Pesanan Pending</p>
            <h3 class="text-2xl font-black">12 Pesanan</h3>
        </div>
    </div>

    <!-- Latest Sales Table -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-8 border-b flex justify-between items-center">
            <h3 class="font-black text-xl">Transaksi Terakhir</h3>
            <a href="#" class="text-indigo-600 font-bold hover:underline">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                    <tr>
                        <th class="px-8 py-4">Pembeli</th>
                        <th class="px-8 py-4">Event</th>
                        <th class="px-8 py-4">Status</th>
                        <th class="px-8 py-4">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y border-t">
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-8 py-6">
                            <p class="font-bold uppercase tracking-wide text-sm">Donni Prabowo</p>
                            <p class="text-xs text-slate-400">donni@example.com</p>
                        </td>
                        <td class="px-8 py-6 font-medium text-slate-600">Jazz Night 2024</td>
                        <td class="px-8 py-6">
                            <span
                                class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-bold uppercase">Success</span>
                        </td>
                        <td class="px-8 py-6 font-black text-indigo-600">Rp 155.000</td>
                    </tr>
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-8 py-6">
                            <p class="font-bold uppercase tracking-wide text-sm">Maya Sari</p>
                            <p class="text-xs text-slate-400">maya@example.com</p>
                        </td>
                        <td class="px-8 py-6 font-medium text-slate-600">AI & Future Workshop</td>
                        <td class="px-8 py-6">
                            <span
                                class="px-3 py-1 bg-orange-100 text-orange-700 rounded-lg text-xs font-bold uppercase">Pending</span>
                        </td>
                        <td class="px-8 py-6 font-black text-indigo-600">Rp 55.000</td>
                    </tr>
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-8 py-6">
                            <p class="font-bold uppercase tracking-wide text-sm">Budi Santoso</p>
                            <p class="text-xs text-slate-400">budi@example.com</p>
                        </td>
                        <td class="px-8 py-6 font-medium text-slate-600">Hackathon 2024</td>
                        <td class="px-8 py-6">
                            <span
                                class="px-3 py-1 bg-slate-100 text-slate-600 rounded-lg text-xs font-bold uppercase">Free</span>
                        </td>
                        <td class="px-8 py-6 font-black text-indigo-600">Rp 0</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
