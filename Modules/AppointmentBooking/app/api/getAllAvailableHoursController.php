<?php

namespace Modules\AppointmentBooking\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\DoctorAvailability\Services\interfaces\getAllAvailableHourInterface;

class getAllAvailableHoursController extends Controller
{
    public function __construct(
        private getAllAvailableHourInterface $getAllAvailableHoursService)
    { }

    public function __invoke(Request $request)
    {
        return $this->getAllAvailableHoursService->getAllAvailableHours();
    }
}
