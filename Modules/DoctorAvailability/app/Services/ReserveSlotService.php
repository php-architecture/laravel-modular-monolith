<?php

namespace Modules\DoctorAvailability\Services;

use Modules\DoctorAvailability\Repositories\AvailabilityHourRepository;
use Modules\DoctorAvailability\Services\interfaces\BookNewAppointmentInterface;

class ReserveSlotService implements BookNewAppointmentInterface
{
    private $availabilityHourRepository;

    public function __construct(AvailabilityHourRepository $availabilityHourRepository)
    {
        $this->availabilityHourRepository = $availabilityHourRepository;
    }

    public function bookNewAppointment($id)
    {
        $this->availabilityHourRepository->bookSlot($id);
    }
}
