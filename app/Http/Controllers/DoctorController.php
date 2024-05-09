<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\MoDoctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function index(Request $request)
    {
        $query = MoDoctor::query();
        if ($request->filled('doctor_name')) {
            $query->where('doctor_name', 'like', '%' . $request->doctor_name . '%');
        }

        if ($request->filled('doctor_specialities')) {
            $query->where('doctor_specialities', 'like', '%' . $request->doctor_specialities . '%');
        }

        if ($request->filled('hospitalname')) {
            $query->whereHas('modoctor2s', function ($q) use ($request) {
                $q->where('hospitalname', 'like', '%' . $request->hospitalname . '%');
            });
        }

        if ($request->filled('city')) {
            $query->where('city', 'like', '%' . $request->city . '%');
        }

        if ($request->filled('doctor_charges_fees_from')) {
            $query->where('from_fees', 'like', $request->doctor_charges_fees_from);
        }

        if ($request->filled('doctor_charges_fees_to')) {
            $query->where('to_fees', 'like', $request->doctor_charges_fees_to);
        }
        $doctors = $query->latest()->get();
        return view('patient.doctor.doctor', compact('doctors'));
    }

    // public function search(Request $request)
    // {
    //     $query = MoDoctor::query();
    //     // $something = MoDoctor2::query();

    //     if ($request->filled('doctor_name')) {
    //         $query->where('doctor_name', 'like', '%' . $request->doctor_name . '%');
    //     }

    //     if ($request->filled('doctor_specialities')) {
    //         $query->where('doctor_specialities', 'like', '%' . $request->doctor_specialities . '%');
    //     }

    //     if ($request->filled('hospitalname')) {
    //         $query->whereHas('modoctor2s', function ($q) use ($request) {
    //             $q->where('hospitalname', 'like', '%' . $request->hospitalname . '%');
    //         });
    //     }


    //     if ($request->filled('city')) {
    //         $query->where('city', 'like', '%' . $request->city . '%');
    //     }

    //     $doctors = $query->latest()->get();

    //     return view('patient.doctor.doctor', compact('doctors'));
    // }
}
