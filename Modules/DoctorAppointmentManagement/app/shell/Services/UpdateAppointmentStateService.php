<?php

namespace Modules\DoctorAppointmentManagement\shell\Services;

use Modules\AppointmentBooking\shared\contract\updateAppointmentStateInterface;

class UpdateAppointmentStateService
{
    private $updateAppointmentStateService;
    public function __construct(updateAppointmentStateInterface $updateAppointmentStateService)
    {
        $this->updateAppointmentStateService = $updateAppointmentStateService;
    }

    public function updateAppointmentState($id, $state)
    {
        return $this->updateAppointmentStateService->updateAppointmentState($id, $state);
    }
}
