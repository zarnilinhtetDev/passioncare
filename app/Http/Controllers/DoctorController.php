<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {

        return view('doctor.doctor');
    }

    public function edit()
    {

        return view('doctor.doctorEdit');
    }
}
