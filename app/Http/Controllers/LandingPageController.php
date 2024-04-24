<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $patient = Patient::find(auth()->user()->id);

        return view('master.index', compact('patient'));
    }
}
