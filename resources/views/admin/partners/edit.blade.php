@extends('layouts.admin')

@section('content')
    <div class="p-6 max-w-2xl mx-auto">
        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('admin.partners.index') }}" class="text-gray-400 hover:text-indigo-600 transition">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h2 class="text-2xl font-bold text-gray-800">Form Edit Partner</h2>
        </div>

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-lg mb-5">
                <p class="font-semibold mb-1"><i class="fa-solid fa-circle-exclamation mr-1"></i>Terdapat kesalahan pada input:</p>
                <ul class="list-disc list-inside text-sm space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST"
            class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 mt-2">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-2 font-medium text-gray-700">Nama Partner</label>
                <input type="text" name="name" value="{{ old('name', $partner->name) }}"
                    class="w-full border border-gray-300 p-2.5 rounded focus:ring focus:ring-indigo-200 focus:border-indigo-400 outline-none"
                    placeholder="Contoh: Tokopedia, Gojek, dst..." required>
            </div>

            <div class="mb-6">
                <label class="block mb-2 font-medium text-gray-700">Logo URL</label>
                <input type="text" name="logo_url" value="{{ old('logo_url', $partner->logo_url) }}"
                    class="w-full border border-gray-300 p-2.5 rounded focus:ring focus:ring-indigo-200 focus:border-indigo-400 outline-none"
                    placeholder="Contoh: https://placehold.co/200x200" required>
            </div>

            <div class="flex justify-end gap-3 border-t pt-4">
                <a href="{{ route('admin.partners.index') }}"
                    class="border border-gray-300 text-gray-600 px-6 py-2.5 rounded font-semibold hover:bg-gray-50 transition">
                    Batal
                </a>
                <button type="submit"
                    class="bg-indigo-600 text-white px-8 py-2.5 rounded font-semibold hover:bg-indigo-700 shadow transition">
                    <i class="fa-solid fa-floppy-disk mr-2"></i>Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
