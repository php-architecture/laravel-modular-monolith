<?php

namespace Modules\DoctorAvailability\Services;

use Modules\DoctorAvailability\Repositories\AvailabilityHourRepository;

class AvailabilityHourService
{
    private $availabilityHourRepository;

    public function __construct(AvailabilityHourRepository $availabilityHourRepository)
    {
        $this->availabilityHourRepository = $availabilityHourRepository;
    }

    public function getAll()
    {
        return $this->availabilityHourRepository->getAll();
    }

    public function create($data)
    {
        $this->availabilityHourRepository->create($data);
    }

}
