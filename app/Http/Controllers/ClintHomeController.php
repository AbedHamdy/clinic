<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\Doctor;

class ClintHomeController extends Controller
{
    public function index()
    {
        $majors = Major::get();
        $doctors = Doctor::with("major")->get();
        return view("clint.pages.home" , compact( "doctors" , "majors"));
    }
}
