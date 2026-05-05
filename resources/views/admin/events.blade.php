@extends('layouts.admin')

@section('content')
    <header class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-3xl font-black">Kelola Event</h1>
            <p class="text-slate-500 font-medium">Buat dan atur acara seru Anda di sini.</p>
        </div>
        <button
            class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 active:scale-95 transition">
            + Tambah Event Baru
        </button>
    </header>

    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="px-8 py-6 bg-slate-50/50 border-b flex gap-4">
            <input type="text" placeholder="Cari nama event..."
                class="flex-1 px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition">
            <select class="px-5 py-3 rounded-xl border-slate-200 border bg-white outline-none">
                <option>Semua Kategori</option>
                <option>Musik</option>
                <option>Workshop</option>
                <option>Olahraga</option>
            </select>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                    <tr>
                        <th class="px-8 py-4 w-16">No</th>
                        <th class="px-8 py-4">Poster</th>
                        <th class="px-8 py-4">Event</th>
                        <th class="px-8 py-4">Harga / Stok</th>
                        <th class="px-8 py-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y border-t">
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="px-8 py-6 font-bold text-slate-400">1</td>
                        <td class="px-8 py-6">
                            <img src="{{ asset('assets/concert.png') }}" class="w-16 h-20 rounded-xl object-cover shadow-sm">
                        </td>
                        <td class="px-8 py-6">
                            <p class="font-black text-slate-800">Jazz Night 2024</p>
                            <p class="text-xs text-slate-400">Musik • 16 Nov 2024</p>
                        </td>
                        <td class="px-8 py-6">
                            <p class="font-bold text-indigo-600">Rp 150.000</p>
                            <p class="text-xs text-slate-400">Stok: 42/100</p>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex gap-2">
                                <button
                                    class="p-2.5 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition">
                                    <i class="fa-solid fa-pen-to-square w-5 h-5 text-center leading-5 relative top-0.5"></i>
                                </button>
                                <button
                                    class="p-2.5 bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition">
                                    <i class="fa-solid fa-trash w-5 h-5 text-center leading-5 relative top-0.5"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="px-8 py-6 font-bold text-slate-400">2</td>
                        <td class="px-8 py-6">
                            <img src="{{ asset('assets/workshop.png') }}" class="w-16 h-20 rounded-xl object-cover shadow-sm">
                        </td>
                        <td class="px-8 py-6">
                            <p class="font-black text-slate-800">AI & Future Workshop</p>
                            <p class="text-xs text-slate-400">Tech • 26 Oct 2024</p>
                        </td>
                        <td class="px-8 py-6">
                            <p class="font-bold text-indigo-600">Rp 50.000</p>
                            <p class="text-xs text-slate-400">Stok: 12/50</p>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex gap-2">
                                <button
                                    class="p-2.5 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition">
                                    <i class="fa-solid fa-pen-to-square w-5 h-5 text-center leading-5 relative top-0.5"></i>
                                </button>
                                <button
                                    class="p-2.5 bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition">
                                    <i class="fa-solid fa-trash w-5 h-5 text-center leading-5 relative top-0.5"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
