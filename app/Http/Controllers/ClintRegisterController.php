<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClintRegisterController extends Controller
{
    public function index()
    {
        return view("clint.pages.register");
    }
}
