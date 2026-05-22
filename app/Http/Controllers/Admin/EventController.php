<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * 5.4.4 – Read: Menampilkan daftar event dengan paginasi
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = \App\Models\Event::with('category');

        if ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%');
        }

        // Memakai relasi dan pengaturan limit paginasi (10 entri per halaman)
        $events = $query->latest()->paginate(10);
        return view('admin.events.index', compact('events', 'search'));
    }

    /**
     * 5.4.5 – Create: Menampilkan form tambah event
     */
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.events.create', compact('categories'));
    }

    /**
     * 5.4.5 – Store: Menyimpan data event baru
     */
    public function store(Request $request)
    {
        // Menerapkan validasi data request dari pengguna
        $data = $request->validate([
            'category_id' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        // Menyimpan data yang telah divalidasi ke dalam tabel menggunakan Model
        \App\Models\Event::create($data);

        return redirect()->route('admin.events.index')
            ->with('success', 'Data Event berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * 5.4.7 – Edit: Menampilkan form edit event
     */
    public function edit(Event $event)
    {
        $categories = \App\Models\Category::all();
        return view('admin.events.edit', compact('event', 'categories'));
    }

    /**
     * 5.4.7 – Update: Menyimpan perubahan data event
     */
    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $event->update($data);

        return redirect()->route('admin.events.index')
            ->with('success', 'Rincian data event berhasil diperbarui.');
    }

    /**
     * 5.4.6 – Destroy: Menghapus data event secara permanen
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Data event berhasil dihapus secara permanen.');
    }
}
