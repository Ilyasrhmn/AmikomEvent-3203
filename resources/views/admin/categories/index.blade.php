@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Manajemen Kategori</h2>
        <a href="{{ route('admin.categories.create') }}"
            class="bg-indigo-600 text-white px-4 py-2 rounded font-semibold hover:bg-indigo-700 transition flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Tambah Kategori
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-5 border border-green-200 flex items-center gap-2">
            <i class="fa-solid fa-circle-check"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full bg-white rounded-lg shadow-sm border border-gray-200 text-left">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200">
                    <th class="p-4 font-semibold text-gray-600">Nama Kategori</th>
                    <th class="p-4 font-semibold text-gray-600">Deskripsi</th>
                    <th class="p-4 font-semibold text-gray-600">Jumlah Event</th>
                    <th class="p-4 font-semibold text-gray-600">Aksi Pilihan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                        <td class="p-4 text-gray-800 font-medium">{{ $category->name }}</td>
                        <td class="p-4 text-gray-600 text-sm">{{ $category->description ?? '-' }}</td>
                        <td class="p-4">
                            <span class="bg-indigo-100 text-indigo-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                {{ $category->events_count }} Event
                            </span>
                        </td>
                        <td class="p-4 flex gap-2">
                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                class="bg-blue-50 text-blue-600 border border-blue-200 px-3 py-1.5 rounded text-sm font-semibold hover:bg-blue-600 hover:text-white transition">
                                <i class="fa-solid fa-pen-to-square mr-1"></i>Edit
                            </a>
                            <form id="form-hapus-cat-{{ $category->id }}" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    onclick="if(confirm('Hapus kategori \'{{ addslashes($category->name) }}\'? Tindakan ini tidak dapat dibatalkan.')) document.getElementById('form-hapus-cat-{{ $category->id }}').submit()"
                                    class="bg-red-100 text-red-600 border border-red-200 px-3 py-1.5 rounded text-sm font-semibold hover:bg-red-600 hover:text-white transition">
                                    <i class="fa-solid fa-trash mr-1"></i>Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-8 text-center text-gray-400">
                            <i class="fa-solid fa-tags text-3xl mb-2 block"></i>
                            Belum ada data kategori. Tambahkan kategori pertama!
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
