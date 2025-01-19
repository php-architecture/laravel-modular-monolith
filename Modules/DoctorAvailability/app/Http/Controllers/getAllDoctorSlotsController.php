<?php

namespace Modules\DoctorAvailability\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\DoctorAvailability\Services\AvailabilityHourService;

class getAllDoctorSlotsController extends Controller
{
    private $availabilityHourService;

    public function __construct(AvailabilityHourService $availabilityHourService)
    {
        $this->availabilityHourService = $availabilityHourService;
    }

    public function __invoke()
    {
        return response()->json(['data' => $this->availabilityHourService->getAll()]);
    }

}
