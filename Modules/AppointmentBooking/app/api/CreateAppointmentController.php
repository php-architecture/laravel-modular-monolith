<?php

namespace Modules\AppointmentBooking\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\AppointmentBooking\application\CreateAppointmentHandler;

class getAllAvailableHoursController extends Controller
{
    private $createAppointmentHandler;
    public function __construct(CreateAppointmentHandler $createAppointmentHandler)
    {
        $this->createAppointmentHandler = $createAppointmentHandler;
    }

    public function __invoke(Request $request)
    {
        //add validation
        return $this->createAppointmentHandler->handle($request->all());
    }
}
