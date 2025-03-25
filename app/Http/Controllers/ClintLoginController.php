<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClintLoginController extends Controller
{
    public function index()
    {
        return view("clint.pages.login");
    }
}
