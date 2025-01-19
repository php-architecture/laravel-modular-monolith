<?php

namespace Modules\DoctorAvailability\Services;

use Modules\DoctorAvailability\Repositories\AvailabilityHourRepository;
use Modules\DoctorAvailability\Services\interfaces\BookNewAppointmentInterface;

class BookNewAppointmentService implements BookNewAppointmentInterface
{
    private $availabilityHourRepository;

    public function __construct(AvailabilityHourRepository $availabilityHourRepository)
    {
        $this->availabilityHourRepository = $availabilityHourRepository;
    }

    public function bookNewAppointment($data)
    {
        $this->availabilityHourRepository->bookSlot($data['availability_hour_id']);
    }
}
