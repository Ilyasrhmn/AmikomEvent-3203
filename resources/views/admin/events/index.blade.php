@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Manajemen Event</h2>
        <a href="{{ route('admin.events.create') }}"
            class="bg-indigo-600 text-white px-4 py-2 rounded font-semibold hover:bg-indigo-700 transition flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Tambah Event
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
                    <th class="p-4 font-semibold text-gray-600">Judul Event</th>
                    <th class="p-4 font-semibold text-gray-600">Kategori</th>
                    <th class="p-4 font-semibold text-gray-600">Tanggal</th>
                    <th class="p-4 font-semibold text-gray-600">Harga</th>
                    <th class="p-4 font-semibold text-gray-600">Stok</th>
                    <th class="p-4 font-semibold text-gray-600">Aksi Pilihan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                        <td class="p-4 text-gray-800 font-medium">{{ $event->title }}</td>
                        <td class="p-4">
                            <span class="bg-indigo-100 text-indigo-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                {{ $event->category->name ?? '-' }}
                            </span>
                        </td>
                        <td class="p-4 text-gray-600 text-sm">
                            {{ \Carbon\Carbon::parse($event->date)->format('d M Y, H:i') }}
                        </td>
                        <td class="p-4 text-gray-700 text-sm">
                            Rp {{ number_format($event->price, 0, ',', '.') }}
                        </td>
                        <td class="p-4 text-gray-700 text-sm">{{ $event->stock }}</td>
                        <td class="p-4 flex gap-2">
                            <a href="{{ route('admin.events.edit', $event->id) }}"
                                class="bg-blue-50 text-blue-600 border border-blue-200 px-3 py-1.5 rounded text-sm font-semibold hover:bg-blue-600 hover:text-white transition">
                                <i class="fa-solid fa-pen-to-square mr-1"></i>Edit Data
                            </a>
                            <form id="form-hapus-event-{{ $event->id }}" action="{{ route('admin.events.destroy', $event->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    onclick="if(confirm('Hapus event \'{{ addslashes($event->title) }}\'? Tindakan ini tidak dapat dibatalkan.')) document.getElementById('form-hapus-event-{{ $event->id }}').submit()"
                                    class="bg-red-100 text-red-600 border border-red-200 px-3 py-1.5 rounded text-sm font-semibold hover:bg-red-600 hover:text-white transition">
                                    <i class="fa-solid fa-trash mr-1"></i>Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-8 text-center text-gray-400">
                            <i class="fa-solid fa-calendar-xmark text-3xl mb-2 block"></i>
                            Belum ada data event. Tambahkan event pertama Anda!
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginasi --}}
    <div class="mt-5">
        {{ $events->links() }}
    </div>
</div>

@endsection
