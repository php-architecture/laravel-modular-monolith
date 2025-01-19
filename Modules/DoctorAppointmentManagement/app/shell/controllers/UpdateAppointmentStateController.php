<?php

namespace Modules\DoctorAppointmentManagement\shell\controllers;

use App\Http\Controllers\Controller;
use Modules\DoctorAppointmentManagement\shell\Requests\UpdateAppointmentStateRequest;
use Modules\DoctorAppointmentManagement\shell\Services\UpdateAppointmentStateService;

class UpdateAppointmentStateController extends Controller
{
    private $updateAppointmentStateService;

    public function __construct(UpdateAppointmentStateService $updateAppointmentStateService)
    {
        $this->updateAppointmentStateService = $updateAppointmentStateService;
    }

    public function __invoke(UpdateAppointmentStateRequest $request)
    {
        $validated = $request->validated();

        $this->updateAppointmentStateService->updateAppointmentState($validated['uuid'], $validated['state']);

        return response()->json(['message' => 'Appointment updated successfully']);
    }
}
