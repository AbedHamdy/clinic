<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;

class ClintMajorController extends Controller
{
    public function index()
    {
        $majors = Major::paginate(10);  // default pagnation = 15 
        return view("clint.pages.majors" , compact("majors"));
    }

    public function create()
    {
        return view("clint.pages.majors.create-major");
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                "name" => "required|string|max:100|min:3|unique:majors,name_specialty"
            ]
        );

        Major::create(
            [
                "name_specialty" => $data["name"]
            ]
        );
        return redirect()->route("create-major")->with("success" , "Major Created Successfully");
    }

    public function show($id)
    {
        $major = Major::find($id);
        if($major)
        {
            return view("clint.pages.majors.show-major" , compact("major"));
        }
        else
        {
            return redirect()->route("clint-majors")->with("error" , "Major Not Found");
        }
    }

    public function update(Request $request)
    {
        $data = $request->validate(
            [
                "name" => "required|string|max:100|min:3|unique:majors,name_specialty",
                "id" => "required|integer"
            ]
        );

        $major = Major::findOrFail($data["id"]);
        $major->update([
            "name_specialty" => $data["name"],
        ]);
        // $major->name_specialty = $data["name"];
        // $major->save();
        return redirect()->route("clint-majors")->with("success-update-major" , "Major Updated Successfully");
    }

    public function destroy($id)
    {
        $major = Major::find($id);
        if($major)
        {
            $major->doctors()->delete();
            $major->delete();
            return redirect()->route("clint-majors")->with("success" , "Major Deleted Successfully");
        }
        else
        {
            return redirect()->route("clint-majors")->with("error" , "Major Not Found");
        }
    }
}
