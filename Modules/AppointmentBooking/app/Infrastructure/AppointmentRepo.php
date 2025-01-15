<?php

namespace Modules\AppointmentBooking\Infrastructure;

use Modules\AppointmentBooking\models\Domain\Appointment;
use Modules\AppointmentBooking\domain\contracts\AppointmentRepoInterface;

class AppointmentRepo implements AppointmentRepoInterface
{
    public function bookAppointment(array $data)
    {
        return Appointment::create($data);
    }
}
