<?php

namespace Modules\DoctorAvailability\Services;

use Modules\DoctorAvailability\Repositories\AvailabilityHourRepository;
use Modules\DoctorAvailability\Services\interfaces\getAllAvailableHourInterface;

class getAllAvailableHoursService implements getAllAvailableHourInterface
{

    private $availabilityHourRepository;

    public function __construct(AvailabilityHourRepository $availabilityHourRepository)
    {
        $this->availabilityHourRepository = $availabilityHourRepository;
    }

    public function getAllAvailableHours()
    {
        return $this->availabilityHourRepository->getAllAvailableHours();
    }
}
