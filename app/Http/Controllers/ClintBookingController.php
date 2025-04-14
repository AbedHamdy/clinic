<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Events\BookingEvent;
use App\Mail\BookingMail;

class ClintBookingController extends Controller
{
    public function index($id)
    {
        $doctor = Doctor::find($id);
        return view("clint.pages.booking" , compact("doctor"));
    }

    public function create(Request $request)
    {
        $data = $request->validate(
            [
                "name" => "required|string|max:100|min:3" ,
                "phone" => "required|numeric|digits:11" ,
                "email" => "required|email"
            ]
        );

        $user_id = Auth::user()->id;
        // $data["user_id"] = $user_id;
        // return $data;
        $booking = Appointment::create(
            [
                "name" => $data["name"] ,
                "phone" => $data["phone"] ,
                "email" => $data["email"] ,
                "user_id" => $user_id
            ]
        );

        event(new BookingEvent($booking));

        Mail::to($data["email"])->send(new BookingMail($data));
        
        return redirect()->route("clint-home")->with("success" , "Booking Created Successfully");
    }
}
