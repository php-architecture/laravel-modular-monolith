<?php

namespace Modules\DoctorAppointmentManagement\shell\Services;

use Modules\AppointmentBooking\shared\contract\getAllAppointmentInterface;

class GetAllUpcomingAppointmentService
{
    private $getAllAppointmentService;
    public function __construct(getAllAppointmentInterface $getAllAppointmentService)
    {
        $this->getAllAppointmentService = $getAllAppointmentService;
    }

    public function getAllUpcomingAppointments()
    {
        return $this->getAllAppointmentService->getAllUpcomingAppointments();
    }
}
