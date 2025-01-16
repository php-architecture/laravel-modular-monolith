<?php

namespace Modules\AppointmentBooking\shared\contract;

interface updateAppointmentStateInterface
{
    public function updateAppointmentState($id, $state);
}
