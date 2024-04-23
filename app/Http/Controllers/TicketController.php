<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        return view('ticket.ticket');
    }
    public function reason()
    {
        return view('ticket.reason');
    }
}
