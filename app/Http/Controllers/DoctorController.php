<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\MoDoctor;
use App\Models\MoDoctor2;
use App\Models\MoHospital;
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

        if ($request->filled('doctor_charges_fees_from') && $request->filled('doctor_charges_fees_to')) {
            $from = $request->doctor_charges_fees_from;
            $to = $request->doctor_charges_fees_to;

            $query->where(function ($q) use ($from, $to) {
                $q->where(function ($subQuery) use ($from) {
                    $subQuery->where('from_fees', '<=', $from)
                        ->where('to_fees', '>=', $from);
                })->orWhere(function ($subQuery) use ($to) {
                    $subQuery->where('from_fees', '<=', $to)
                        ->where('to_fees', '>=', $to);
                })->orWhere(function ($subQuery) use ($from, $to) {
                    $subQuery->where('from_fees', '>=', $from)
                        ->where('to_fees', '<=', $to);
                });
            });
        } elseif ($request->filled('doctor_charges_fees_from')) {
            $query->where('from_fees', '>=', $request->doctor_charges_fees_from);
        } elseif ($request->filled('doctor_charges_fees_to')) {
            $query->where('to_fees', '<=', $request->doctor_charges_fees_to)->orWhere('from_fees', '<', $request->doctor_charges_fees_to);
        }

        $doctors = $query->latest()->get();
        $doctor2 = MoDoctor2::latest()->get();
        $hospitals = MoHospital::latest()->get();
        $ticket_id = $request->ticket_id ?? "";

        // if($ticket_id){
        //     return redirect("assign/{{$ticket_id}}",compact('doctors', 'doctor2','ticket_id'));
        // }
        return view('patient.doctor.doctor', compact('doctors', 'doctor2', 'ticket_id', 'hospitals'));
    }
}
