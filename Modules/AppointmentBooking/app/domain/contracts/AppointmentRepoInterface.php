<?php

namespace Modules\AppointmentBooking\domain\contracts;

interface AppointmentRepoInterface
{
    public function bookAppointment(array $data);
}
