<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index()
    {

        $hospitals = Hospital::latest()->get();
        return view('hospital.hospital', compact('hospitals'));
    }

    public function store(Request $request)
    {

        $hospital = new Hospital();
        $hospital->hospital_name = $request->hospital_name;
        $hospital->hospital_phone_number = $request->hospital_phone_number;
        $hospital->hospital_address = $request->hospital_address;
        $hospital->hospital_google_address_link = $request->hospital_google_address_link;
        $hospital->save();
        return redirect()->back()->with('success', 'Hospital Register Is Successfully');
    }

    public function edit()
    {

        return view('hospital.hospitalEdit');
    }
}
