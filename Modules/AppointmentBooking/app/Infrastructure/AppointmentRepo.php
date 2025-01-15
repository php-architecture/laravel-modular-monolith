<?php

namespace Modules\AppointmentBooking\Infrastructure;

use Illuminate\Support\Str;
use Modules\AppointmentBooking\domain\contracts\AppointmentRepoInterface;
use Modules\AppointmentBooking\domain\models\Appointment;

class AppointmentRepo implements AppointmentRepoInterface
{
    public function bookAppointment(array $data)
    {
        return Appointment::create(array_merge($data, ['uuid' => Str::uuid()]));
    }
}
