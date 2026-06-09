@extends('layouts.admin')

@section('content')
    <div class="p-6 max-w-4xl mx-auto">
        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('admin.events.index') }}" class="text-gray-400 hover:text-indigo-600 transition">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h2 class="text-2xl font-bold text-gray-800">Form Tambah Event</h2>
        </div>

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-lg mb-5">
                <p class="font-semibold mb-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>Terdapat kesalahan pada input:
                </p>
                <ul class="list-disc list-inside text-sm space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white rounded-2xl border border-slate-200 shadow-sm">
            @csrf

            <div class="px-6 py-4 border-b border-slate-200 bg-slate-50">
                <h3 class="text-sm font-semibold text-slate-600 uppercase tracking-wide">Detail Event</h3>
            </div>

            <div class="p-6">

                {{-- Judul Event --}}
                <div class="mb-4">
                    <label class="block mb-2 font-medium text-slate-700">Judul Event</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full border border-slate-200 px-4 py-2.5 rounded-lg focus:ring focus:ring-indigo-100 focus:border-indigo-400 outline-none"
                        placeholder="Masukkan judul event..." required>
                </div>

                {{-- Kategori Event --}}
                <div class="mb-4">
                    <label class="block mb-2 font-medium text-slate-700">Kategori Event</label>
                    <select name="category_id"
                        class="w-full border border-slate-200 px-4 py-2.5 rounded-lg focus:ring focus:ring-indigo-100 focus:border-indigo-400 outline-none"
                        required>
                        <option value="" disabled selected>-- Pilih Kategori --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Deskripsi --}}
                <div class="mb-4">
                    <label class="block mb-2 font-medium text-slate-700">Deskripsi Pendek</label>
                    <textarea name="description"
                        class="w-full border border-slate-200 px-4 py-2.5 rounded-lg focus:ring focus:ring-indigo-100 focus:border-indigo-400 outline-none"
                        rows="3" placeholder="Deskripsikan event ini..." required>{{ old('description') }}</textarea>
                </div>

                {{-- Tanggal, Harga, Stok --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-4">
                    <div>
                        <label class="block mb-2 font-medium text-slate-700">Tanggal & Waktu</label>
                        <input type="datetime-local" name="date" value="{{ old('date') }}"
                            class="w-full border border-slate-200 px-4 py-2.5 rounded-lg focus:ring focus:ring-indigo-100 outline-none"
                            required>
                    </div>
                    <div>
                        <label class="block mb-2 font-medium text-slate-700">Harga Tiket (Rp)</label>
                        <input type="number" name="price" value="{{ old('price') }}" min="0"
                            class="w-full border border-slate-200 px-4 py-2.5 rounded-lg focus:ring focus:ring-indigo-100 outline-none"
                            placeholder="0" required>
                    </div>
                    <div>
                        <label class="block mb-2 font-medium text-slate-700">Kapasitas Stok</label>
                        <input type="number" name="stock" value="{{ old('stock') }}" min="1"
                            class="w-full border border-slate-200 px-4 py-2.5 rounded-lg focus:ring focus:ring-indigo-100 outline-none"
                            placeholder="100" required>
                    </div>
                </div>

                {{-- Lokasi --}}
                <div class="mb-6">
                    <label class="block mb-2 font-medium text-slate-700">Lokasi / Gedung</label>
                    <input type="text" name="location" value="{{ old('location') }}"
                        class="w-full border border-slate-200 px-4 py-2.5 rounded-lg focus:ring focus:ring-indigo-100 focus:border-indigo-400 outline-none"
                        placeholder="Contoh: Gedung Serbaguna Lt.2, Amikom..." required>
                </div>

                {{-- Poster Event --}}
                <div class="mb-6">
                    <label class="block mb-2 font-medium text-gray-700">Poster Event (Opsional)</label>
                    <input type="file" name="poster" accept="image/*" class="w-full border border-gray-300 p-2.5 rounded">
                </div>
            </div>

            <div class="flex justify-end gap-3 border-t border-slate-200 px-6 py-4">
                <a href="{{ route('admin.events.index') }}"
                    class="border border-slate-200 text-slate-600 px-6 py-2.5 rounded-lg font-semibold hover:bg-white transition">
                    Batal
                </a>
                <button type="submit"
                    class="bg-indigo-600 text-white px-8 py-2.5 rounded-lg font-semibold hover:bg-indigo-700 shadow-sm transition">
                    <i class="fa-solid fa-floppy-disk mr-2"></i>Simpan Data
                </button>
            </div>
        </form>
    </div>
@endsection