<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    // User Area Methods
    public function show()
    {
        return view('event-detail');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function ticket()
    {
        return view('ticket');
    }

    // Admin Area Method
    public function indexAdmin()
    {
        return view('admin.events');
    }
}
