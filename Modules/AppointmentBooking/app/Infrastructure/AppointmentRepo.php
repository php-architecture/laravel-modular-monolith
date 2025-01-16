<?php

namespace Modules\AppointmentBooking\Infrastructure;

use Illuminate\Support\Str;
use Modules\AppointmentBooking\domain\models\Appointment;
use Modules\AppointmentBooking\domain\contracts\AppointmentRepoInterface;

class AppointmentRepo implements AppointmentRepoInterface
{
    public function bookAppointment(array $data)
    {
        return Appointment::create(array_merge($data, ['uuid' => Str::uuid()]));
    }

    public function getAllUpcomingAppointments()
    {
        // we need to add date check filter
        return Appointment::where('state', 'upcoming')
            ->get();
    }

    public function updateAppointmentState($id, $state)
    {
        // dd(Appointment::where('uuid', $id)->first());
        return Appointment::where('uuid', $id)->update(['state' => $state]);
    }
}
