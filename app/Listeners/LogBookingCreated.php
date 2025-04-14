<?php

namespace App\Listeners;

use App\Events\BookingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogBookingCreated
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BookingEvent $event): void
    {
        Log::info("Booking Created: ", [
            'booking_id' => $event->booking->id,
            'user_id' => $event->booking->user_id,
            'created_at' => $event->booking->created_at,
        ]);
    }
}
