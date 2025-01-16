<?php

namespace Modules\DoctorAvailability\Services;

use Modules\DoctorAvailability\Models\AvailabilityHour;
use Modules\DoctorAvailability\Repositories\AvailabilityHourRepository;
use Modules\DoctorAvailability\Services\interfaces\ReserveSlotInterface;

class ReserveSlotService implements ReserveSlotInterface
{
    private $availabilityHourRepository;

    public function __construct(AvailabilityHourRepository $availabilityHourRepository)
    {
        $this->availabilityHourRepository = $availabilityHourRepository;
    }

    public function reserveSlot($id) : AvailabilityHour
    {
        return $this->availabilityHourRepository->bookSlot($id);
    }
}
