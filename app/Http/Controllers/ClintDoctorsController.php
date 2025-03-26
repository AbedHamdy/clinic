<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Major;

class ClintDoctorsController extends Controller
{
    public function index()
    {
        // $majors = Major::get();
        $doctors = Doctor::with("major")->get();
        return view("clint.pages.doctors",compact("doctors"));
    }
}
