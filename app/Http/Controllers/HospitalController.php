<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\MoHospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = MoHospital::latest()->get();
        return view('patient.hospital.hospital', compact('hospitals'));
    }
}
