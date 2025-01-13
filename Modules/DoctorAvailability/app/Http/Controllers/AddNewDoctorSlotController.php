<?php

namespace Modules\DoctorAvailability\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddNewDoctorSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(Request $request)
    {
        // validation the request in the future
        AvailabilityHour::create($request->all());
    }

}
