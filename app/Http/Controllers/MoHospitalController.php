<?php

namespace App\Http\Controllers;

use App\Models\MoHospital;
use Illuminate\Http\Request;

class MoHospitalController extends Controller
{
    public function index()
    {
        $hospitals = MoHospital::latest()->get();
        return view('mo.hospital.mo_hospital', compact('hospitals'));
    }

    public function store(Request $request, MoHospital $hospital)
    {
        // Hospital::create($request->all());
        $hospital->create($request->all());
        return redirect()->back()->with('success', 'Hospital Registration Is Successful!');
    }

    public function edit(MoHospital $hospital)
    {
        return view('mo.hospital.mo_hospitalEdit', [
            'hospital' => $hospital
        ]);
    }

    public function update(Request $request, MoHospital $hospital)
    {
        $hospital->update($request->all());
        return redirect()->route('hospital')->with('success', 'Hospital Updating Is Successful!');
    }

    public function delete(MoHospital $hospital)
    {
        $hospital->delete();
        return redirect('hospital')->with('delete', 'Hospital Deleted Successfully!');
    }
}
