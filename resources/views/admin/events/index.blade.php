@use('Illuminate\Support\Facades\Storage')
@extends('layouts.admin')

@section('content')
    <div class="p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Manajemen Event</h2>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-5 border border-green-200 flex items-center gap-2">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white rounded-2xl border border-slate-200 shadow-sm">
            <div
                class="flex flex-col gap-3 px-6 py-4 border-b border-slate-200 bg-slate-50 md:flex-row md:items-center md:justify-between">
                <form method="GET" action="{{ route('admin.events.index') }}"
                    class="flex flex-1 flex-col gap-2 sm:flex-row sm:items-center sm:gap-3">
                    <input type="text" name="search" value="{{ $search ?? '' }}"
                        class="w-full flex-1 border border-slate-200 bg-white px-4 py-2.5 rounded-lg focus:ring focus:ring-indigo-100 focus:border-indigo-400 outline-none"
                        placeholder="Cari judul event...">
                    <div class="flex items-center gap-2">
                        <button type="submit"
                            class="bg-indigo-600 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-indigo-700 transition inline-flex items-center gap-2">
                            <i class="fa-solid fa-magnifying-glass"></i> Cari
                        </button>
                        @if($search)
                            <a href="{{ route('admin.events.index') }}"
                                class="border border-slate-200 text-slate-600 px-4 py-2.5 rounded-lg font-semibold hover:bg-white transition">
                                Reset
                            </a>
                        @endif
                    </div>
                </form>
                <a href="{{ route('admin.events.create') }}"
                    class="bg-indigo-600 text-white px-4 py-2.5 rounded-lg font-semibold hover:bg-indigo-700 transition inline-flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i> Tambah Event
                </a>
            </div>
            <table class="min-w-full text-left text-sm">
                <thead class="bg-slate-50 text-slate-500 uppercase text-xs tracking-wide">
                    <tr>
                        <th class="px-6 py-3 font-semibold">Poster</th>
                        <th class="px-6 py-3 font-semibold">Judul Event</th>
                        <th class="px-6 py-3 font-semibold">Kategori</th>
                        <th class="px-6 py-3 font-semibold">Tanggal</th>
                        <th class="px-6 py-3 font-semibold">Harga</th>
                        <th class="px-6 py-3 font-semibold">Stok</th>
                        <th class="px-6 py-3 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($events as $event)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4">
                                <img src="{{ ($event->poster_path && Storage::disk('public')->exists($event->poster_path))
                                    ? asset('storage/' . $event->poster_path)
                                    : 'https://placehold.co/16x20' }}" class="w-16 h-20 rounded-xl object-cover shadow-sm">
                            </td>
                            <td class="px-6 py-4 text-slate-900 font-medium">
                                <p class="max-w-sm truncate">{{ $event->title }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center rounded-full bg-indigo-50 text-indigo-700 text-xs font-semibold px-2.5 py-1">
                                    {{ $event->category->name ?? '-' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-600">
                                {{ \Carbon\Carbon::parse($event->date)->format('d M Y, H:i') }}
                            </td>
                            <td class="px-6 py-4 text-slate-700">
                                Rp {{ number_format($event->price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-slate-700">{{ $event->stock }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.events.edit', $event->id) }}"
                                        class="inline-flex items-center justify-center w-9 h-9 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-900 hover:text-white transition"
                                        aria-label="Edit event">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form id="form-hapus-event-{{ $event->id }}"
                                        action="{{ route('admin.events.destroy', $event->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            onclick="if(confirm('Hapus event \'{{ addslashes($event->title) }}\'? Tindakan ini tidak dapat dibatalkan.')) document.getElementById('form-hapus-event-{{ $event->id }}').submit()"
                                            class="inline-flex items-center justify-center w-9 h-9 rounded-lg border border-slate-200 text-rose-600 hover:bg-rose-600 hover:text-white transition"
                                            aria-label="Hapus event">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-10 text-center text-slate-400">
                                <i class="fa-solid fa-calendar-xmark text-3xl mb-2 block"></i>
                                @if($search)
                                    Tidak ada event yang sesuai dengan pencarian "{{ $search }}"
                                @else
                                    Belum ada data event. Tambahkan event pertama Anda!
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection