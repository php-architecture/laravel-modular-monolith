<?php

namespace Modules\DoctorAppointmentManagement\shell\controllers;

use App\Http\Controllers\Controller;
use Modules\DoctorAppointmentManagement\shell\Services\GetAllUpcomingAppointmentService;

class GetAllUpcomingAppointmentsController extends Controller
{

    private $getAllUpcomingAppointmentsService;
    public function __construct(GetAllUpcomingAppointmentService $getAllUpcomingAppointmentsService)
    {
        $this->getAllUpcomingAppointmentsService = $getAllUpcomingAppointmentsService;
    }

    public function __invoke()
    {
        return $this->getAllUpcomingAppointmentsService->getAllUpcomingAppointments();
    }
}
