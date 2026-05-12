@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Manajemen Partner</h2>
        <a href="{{ route('admin.partners.create') }}"
            class="bg-indigo-600 text-white px-4 py-2 rounded font-semibold hover:bg-indigo-700 transition flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Tambah Partner
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
                    <th class="p-4 font-semibold text-gray-600">Nama Partner</th>
                    <th class="p-4 font-semibold text-gray-600">Logo</th>
                    <th class="p-4 font-semibold text-gray-600">Aksi Pilihan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($partners as $partner)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                        <td class="p-4 text-gray-800 font-medium">{{ $partner->name }}</td>
                        <td class="p-4">
                            <img src="{{ $partner->logo_url }}" alt="Logo {{ $partner->name }}"
                                class="w-16 h-16 object-contain rounded border border-gray-200 bg-gray-50 p-1">
                        </td>
                        <td class="p-4 flex gap-2">
                            <a href="{{ route('admin.partners.edit', $partner->id) }}"
                                class="bg-blue-50 text-blue-600 border border-blue-200 px-3 py-1.5 rounded text-sm font-semibold hover:bg-blue-600 hover:text-white transition">
                                <i class="fa-solid fa-pen-to-square mr-1"></i>Edit
                            </a>
                            <form id="form-hapus-partner-{{ $partner->id }}" action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    onclick="if(confirm('Hapus partner \'{{ addslashes($partner->name) }}\'? Tindakan ini tidak dapat dibatalkan.')) document.getElementById('form-hapus-partner-{{ $partner->id }}').submit()"
                                    class="bg-red-100 text-red-600 border border-red-200 px-3 py-1.5 rounded text-sm font-semibold hover:bg-red-600 hover:text-white transition">
                                    <i class="fa-solid fa-trash mr-1"></i>Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="p-8 text-center text-gray-400">
                            <i class="fa-solid fa-handshake-slash text-3xl mb-2 block"></i>
                            Belum ada data partner. Tambahkan partner pertama!
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
