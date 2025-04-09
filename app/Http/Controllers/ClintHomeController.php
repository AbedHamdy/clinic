<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\Doctor;

class ClintHomeController extends Controller
{
    public function index()
    {
        $majors = Major::take(4)->get();
        $doctors = Doctor::with("major")->take(8)->get();
        return view("clint.pages.home" , compact( "doctors" , "majors"));
    }
}
