<?php

namespace Modules\DoctorAvailability\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\DoctorAvailability\Http\Requests\AddNewDoctorSlotRequest;
use Modules\DoctorAvailability\Models\AvailabilityHour;

class AddNewDoctorSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(AddNewDoctorSlotRequest $request)
    {
        $validated = $request->validated();

        AvailabilityHour::create(array_merge($validated, [
            'uuid' => \Str::uuid(),
            'is_reserved' => false,
        ]));

        return response()->json(['message' => 'Slot created successfully'], 201);
    }

}
