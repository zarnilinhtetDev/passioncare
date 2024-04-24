<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::latest()->get();
        return view('doctor.doctor', compact('doctors'));
    }

    public function store(Request $request)
    {

        $doctor = new Doctor();
        $doctor->doctor_name = $request->doctor_name;
        $doctor->doctor_specialities = $request->doctor_specialities;
        $doctor->doctor_experience = $request->doctor_experience;
        $doctor->hospital_name = $request->hospital_name;
        $doctor->doctor_city = $request->doctor_city;
        $doctor->doctor_charges_fees_from = $request->doctor_charges_fees_from;
        $doctor->doctor_charges_fees_to = $request->doctor_charges_fees_to;
        $doctor->save();
        return redirect()->back()->with('success', 'Doctor Register Is Successfully');
    }

    public function search(Request $request)
    {
        $query = Doctor::query();

        if ($request->filled('doctor_name')) {
            $query->where('doctor_name', 'like', '%' . $request->doctor_name . '%');
        }

        if ($request->filled('doctor_specialities')) {
            $query->where('doctor_specialities', 'like', '%' . $request->doctor_specialities . '%');
        }

        if ($request->filled('hospital_name')) {
            $query->where('hospital_name', 'like', '%' . $request->hospital_name . '%');
        }

        if ($request->filled('doctor_city')) {
            $query->where('doctor_city', 'like', '%' . $request->doctor_city . '%');
        }

        if ($request->filled('doctor_charges_fees_from') && $request->filled('doctor_charges_fees_to')) {
            $query->whereBetween('doctor_charges_fees_from', [$request->doctor_charges_fees_from, $request->doctor_charges_fees_to]);
        }

        $doctors = $query->latest()->get();

        return view('doctor.doctor', compact('doctors'));
    }



    public function edit()
    {

        return view('doctor.doctorEdit');
    }
}
