<?php

namespace App\Http\Controllers;

use App\Models\HospitalBooking;
use App\Models\Patient;


class LandingPageController extends Controller
{
    public function index()
    {
        $patient = Patient::where('user_id', auth()->user()->id)->first();
        $bookings = HospitalBooking::where('patient_id', auth()->user()->id)->get();

        return view('master.index', compact('patient', 'bookings'));
    }
}
