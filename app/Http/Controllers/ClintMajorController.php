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

        major::create(
            [
                "name_specialty" => $data["name"]
            ]
        );
        return redirect()->route("create-major")->with("success" , "Major Created Successfully");
    }
}
