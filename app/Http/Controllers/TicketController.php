<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        return view('patient.ticket.ticket');
    }
    public function ticket_info()
    {
        return view('patient.ticket.ticket_info');
    }
}
