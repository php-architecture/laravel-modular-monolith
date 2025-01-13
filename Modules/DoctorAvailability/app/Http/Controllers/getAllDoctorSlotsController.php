<?php

namespace Modules\DoctorAvailability\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\DoctorAvailability\Models\AvailabilityHour;

class getAllDoctorSlotsController extends Controller
{
    public function __invoke()
    {
        return response()->json(['data' => AvailabilityHour::all()]);
    }

}
