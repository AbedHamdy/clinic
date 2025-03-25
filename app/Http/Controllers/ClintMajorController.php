<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;

class ClintMajorController extends Controller
{
    public function index()
    {
        $majors = Major::get();
        return view("clint.pages.majors" , compact("majors"));
    }
}
