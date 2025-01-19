<?php

namespace Modules\AppointmentBooking\shared;

use Modules\AppointmentBooking\domain\contracts\AppointmentRepoInterface;
use Modules\AppointmentBooking\shared\contract\getAllAppointmentInterface;

class GetAllAppointmentService implements getAllAppointmentInterface
{
    private $appointmentRepo;
    public function __construct(AppointmentRepoInterface $appointmentRepo)
    {
        $this->appointmentRepo = $appointmentRepo;
    }

    public function getAllUpcomingAppointments()
    {
        return $this->appointmentRepo->getAllUpcomingAppointments();
    }
}
