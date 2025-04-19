<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\Doctor;

class CreateDoctor extends Controller
{
    public function index()
    {
        $majors = Major::paginate();
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

    public function show($id)
    {
        $doctor = Doctor::with('major')->find($id);
        if($doctor)
        {
            return view("clint.pages.doctors.show-doctor" , compact("doctor"));
        }
        else
        {
            return redirect()->route("clint-doctors")->with("error" , "Major Not Found");

        }
    }

    public function update(Request $request)
    {
        $data = $request->validate(
            [
                "name" => "required|string|max:100|min:3|unique:majors,name_specialty",
                "id" => "required|integer",
            ]
        );

        $doctor = Doctor::findOrFail($data["id"]);
        $doctor->update([
            "name" => $data["name"],
        ]);
        // $major->name_specialty = $data["name"];
        // $major->save();
        return redirect()->route("clint-doctors")->with("success-update-doctor" , "Doctor Updated Successfully");
    }

    public function destroy($id)
    {
        Doctor::findOrFail($id)->delete();
        return redirect()->route("clint-doctors")->with("error" , "Doctor Not Found");
        // return redirect("clint-doctors")->with("success-delete-doctor" , "Doctor Deleted Successfully");

        // $doctor = Doctor::find($id);
        // dd($doctor);
        // if($doctor)
        // {
        //     $doctor->delete();
        //    return redirect("clint-doctors")->with("success-delete-doctor" , "Doctor Deleted Successfully");
        // }
        // else
        // {
            
        //     return redirect()->route("clint-doctors")->with("error" , "Doctor Not Found");
        // }
    }
}
