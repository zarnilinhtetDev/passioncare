<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        return view('ticket.ticket');
    }
    public function tickiet_info()
    {
        return view('ticket.ticket_info');
    }
}
