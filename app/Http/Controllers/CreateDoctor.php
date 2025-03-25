<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\Doctor;

class CreateDoctor extends Controller
{
    public function index()
    {
        $majors = Major::get();
        return view("clint.pages.doctors.create-doctor" , compact("majors"));
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                "name" => "required|string|max:50" ,
                "major_id" =>"required|"
            ]
        );

        $doctor = Doctor::create(
            [
                "name" => $data["name"] ,
                "major_id" => $data["major_id"]
            ]
        );
        return $doctor;
    }
}
