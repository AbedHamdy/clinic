<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;

class ShowDoctorsToMajor extends Controller
{
    public function show($id)
    {
        $major = Major::with('doctors')->find($id);
        
        if (!$major) 
        {
            return redirect()->route('clint-majors')->with('error', "Specialty not found");
        }

        $doctors = $major->doctors;
        return view("clint.pages.show-doctors" , compact("doctors"));
    }
}
