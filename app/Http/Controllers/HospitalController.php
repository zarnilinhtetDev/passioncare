<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index()
    {

        return view('hospital.hospital');
    }

    public function edit()
    {

        return view('hospital.hospitalEdit');
    }
}
