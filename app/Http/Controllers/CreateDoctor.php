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
                "name" => "required|string|max:100|min:3" ,
                "major" =>"required|"
            ]
        );

        Doctor::create(
            [
                "name" => $data["name"] ,
                "major_id" => $data["major"]
            ]
        );
        return redirect()->route("create-doctor")->with("success" , "Doctor Created Successfully");
    }

    public function destroy($id)
    {
        Doctor::find($id)->delete();
        return redirect("create-doctor");
    }
}
