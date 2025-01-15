<?php

namespace Modules\AppointmentBooking\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\DoctorAvailability\Services\interfaces\getAllAvailableHourInterface;

class getAllAvailableHoursController extends Controller
{
    private $getAllAvailableHoursService;
    public function __construct(getAllAvailableHourInterface $getAllAvailableHoursService)
    {
        $this->getAllAvailableHoursService = $getAllAvailableHoursService;
    }

    public function __invoke(Request $request)
    {

        return $this->getAllAvailableHoursService->getAllAvailableHours();
    }
}
