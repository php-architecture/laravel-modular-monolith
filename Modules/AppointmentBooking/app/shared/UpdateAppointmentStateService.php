<?php

namespace Modules\AppointmentBooking\shared;

use Modules\AppointmentBooking\domain\contracts\AppointmentRepoInterface;
use Modules\AppointmentBooking\shared\contract\updateAppointmentStateInterface;

class UpdateAppointmentStateService implements updateAppointmentStateInterface
{
    private $appointmentRepo;
    public function __construct(AppointmentRepoInterface $appointmentRepo)
    {
        $this->appointmentRepo = $appointmentRepo;
    }

    public function updateAppointmentState($id, $state)
    {
        return $this->appointmentRepo->updateAppointmentState($id, $state);
    }
}
