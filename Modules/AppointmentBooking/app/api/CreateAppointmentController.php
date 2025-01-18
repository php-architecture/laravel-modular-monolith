<?php

namespace Modules\AppointmentBooking\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Modules\AppointmentBooking\application\CreateAppointmentHandler;
use Modules\AppointmentBooking\api\Requests\CreateAppointmentRequest;

class CreateAppointmentController extends Controller
{
    public function __construct(
        private CreateAppointmentHandler $createAppointmentHandler
    ){ }

    public function __invoke(CreateAppointmentRequest $request)
    {
        $this->createAppointmentHandler->handle($request->validated());

        return response()->json(['message' => 'Appointment created successfully'], 201);
    }
}
