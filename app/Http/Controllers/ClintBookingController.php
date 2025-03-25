<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class ClintBookingController extends Controller
{
    public function index($id)
    {
        $doctor = Doctor::find($id);
        return view("clint.pages.booking" , compact("doctor"));
    }
}
