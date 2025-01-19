<?php

namespace Modules\AppointmentConfirmation\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\AppointmentBooking\domain\models\Appointment;

class AppointmentConfirmation
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
    public function handle(\Modules\AppointmentBooking\Events\AppointmentCreated $event): void
    {
        $appointment = $event->appointment;

        logger("Appointment with these details needs your Confirmation: \nDate: '{$appointment->date}', for doctor: '{$appointment->availabilityHour()->first()->doctor()->first()->name}'");
    }
}
