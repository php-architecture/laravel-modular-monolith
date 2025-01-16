<?php

namespace Modules\DoctorAppointmentManagement\shell\controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\DoctorAppointmentManagement\shell\Services\UpdateAppointmentStateService;

class UpdateAppointmentStateController extends Controller
{
    private $updateAppointmentStateService;
    public function __construct(UpdateAppointmentStateService $updateAppointmentStateService)
    {
        $this->updateAppointmentStateService = $updateAppointmentStateService;
    }

    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'uuid'  => 'required|uuid|exists:appointments,uuid',
            'state' => 'required|string|in:completed,cancelled'
        ]);

        return $this->updateAppointmentStateService->updateAppointmentState($validated['uuid'], $validated['state']);
    }
}
