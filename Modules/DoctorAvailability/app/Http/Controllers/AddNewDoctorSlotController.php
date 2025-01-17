<?php

namespace Modules\DoctorAvailability\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\DoctorAvailability\Services\AvailabilityHourService;
use Modules\DoctorAvailability\Http\Requests\AddNewDoctorSlotRequest;

class AddNewDoctorSlotController extends Controller
{
    private $availabilityHourService;

    public function __construct(AvailabilityHourService $availabilityHourService)
    {
        $this->availabilityHourService = $availabilityHourService;
    }

    public function __invoke(AddNewDoctorSlotRequest $request)
    {
        $this->availabilityHourService->create($request->validated());

        return response()->json(['message' => 'Slot created successfully'], 201);
    }

}
