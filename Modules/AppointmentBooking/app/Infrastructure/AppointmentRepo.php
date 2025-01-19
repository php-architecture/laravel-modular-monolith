<?php

namespace Modules\AppointmentBooking\Infrastructure;

use Illuminate\Support\Str;
use Modules\AppointmentBooking\domain\models\Appointment;
use Modules\AppointmentBooking\domain\contracts\AppointmentRepoInterface;

class AppointmentRepo implements AppointmentRepoInterface
{
        public function bookAppointment(array $data)
    {
        return Appointment::create(array_merge($data, [
            'uuid' => Str::uuid(),
            'reserved_at' => now()
        ]));
    }

    public function getAllUpcomingAppointments()
    {
        return Appointment::where('state', 'upcoming')
            ->where('date', '>=', now())
            ->get();
    }

    public function updateAppointmentState($id, $state)
    {
        return Appointment::where('uuid', $id)->update(['state' => $state]);
    }
}
