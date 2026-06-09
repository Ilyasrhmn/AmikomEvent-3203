@extends('layouts.admin')

@section('content')
    <div class="p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Manajemen Kategori</h2>
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
                <form method="GET" action="{{ route('admin.categories.index') }}"
                    class="flex flex-1 flex-col gap-2 sm:flex-row sm:items-center sm:gap-3">
                    <input type="text" name="search" value="{{ $search ?? '' }}"
                        class="w-full flex-1 border border-slate-200 bg-white px-4 py-2.5 rounded-lg focus:ring focus:ring-indigo-100 focus:border-indigo-400 outline-none"
                        placeholder="Cari nama kategori...">
                    <div class="flex items-center gap-2">
                        <button type="submit"
                            class="bg-indigo-600 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-indigo-700 transition inline-flex items-center gap-2">
                            <i class="fa-solid fa-magnifying-glass"></i> Cari
                        </button>
                        @if($search)
                            <a href="{{ route('admin.categories.index') }}"
                                class="border border-slate-200 text-slate-600 px-4 py-2.5 rounded-lg font-semibold hover:bg-white transition">
                                Reset
                            </a>
                        @endif
                    </div>
                </form>
                <a href="{{ route('admin.categories.create') }}"
                    class="bg-indigo-600 text-white px-4 py-2.5 rounded-lg font-semibold hover:bg-indigo-700 transition inline-flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i> Tambah Kategori
                </a>
            </div>
            <table class="min-w-full text-left text-sm">
                <thead class="bg-slate-50 text-slate-500 uppercase text-xs tracking-wide">
                    <tr>
                        <th class="px-6 py-3 font-semibold">Nama Kategori</th>
                        <th class="px-6 py-3 font-semibold">Deskripsi</th>
                        <th class="px-6 py-3 font-semibold">Jumlah Event</th>
                        <th class="px-6 py-3 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($categories as $category)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 text-slate-900 font-medium">{{ $category->name }}</td>
                            <td class="px-6 py-4 text-slate-600">
                                <p class="max-w-md truncate">{{ $category->description ?? '-' }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center rounded-full bg-indigo-50 text-indigo-700 text-xs font-semibold px-2.5 py-1">
                                    {{ $category->events_count }} Event
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                        class="inline-flex items-center justify-center w-9 h-9 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-900 hover:text-white transition"
                                        aria-label="Edit kategori">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form id="form-hapus-cat-{{ $category->id }}"
                                        action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            onclick="if(confirm('Hapus kategori \'{{ addslashes($category->name) }}\'? Tindakan ini tidak dapat dibatalkan.')) document.getElementById('form-hapus-cat-{{ $category->id }}').submit()"
                                            class="inline-flex items-center justify-center w-9 h-9 rounded-lg border border-slate-200 text-rose-600 hover:bg-rose-600 hover:text-white transition"
                                            aria-label="Hapus kategori">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-slate-400">
                                <i class="fa-solid fa-tags text-3xl mb-2 block"></i>
                                @if($search)
                                    Tidak ada kategori yang sesuai dengan pencarian "{{ $search }}"
                                @else
                                    Belum ada data kategori. Tambahkan kategori pertama!
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection