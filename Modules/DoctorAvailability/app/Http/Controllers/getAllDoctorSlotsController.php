<?php

namespace Modules\DoctorAvailability\Http\Controllers;

use App\Http\Controllers\Controller;

class getAllDoctorSlotsController extends Controller
{
    public function __invoke()
    {
        return AvailabilityHour::all();
    }

}
