<?php

namespace Modules\AppointmentBooking\domain\contracts;

interface AppointmentRepoInterface
{
    public function bookAppointment(array $data);
    public function getAllUpcomingAppointments();
    public function updateAppointmentState($id, $state);
}
