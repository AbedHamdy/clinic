<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Events\BookingEvent; // Import the BookingEvent class
use Illuminate\Support\Facades\Mail; // Import the Mail facade
use App\Mail\BookingMail; // Import the BookingMail class
use App\Models\User; // Import the User model

class BookingController extends Controller
{
    // public function createBooking($id)
    // {
    //     $user = User::find($id);

    //     return $user;
    // }
}
