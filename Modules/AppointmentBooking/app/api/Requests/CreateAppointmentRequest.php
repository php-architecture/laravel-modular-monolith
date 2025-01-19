<?php

namespace Modules\AppointmentBooking\api\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateAppointmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'slot_id'=> ['required', 'uuid', Rule::exists('availability_hours', 'uuid')],
            'patient_name' => ['required', 'string', 'max:255'],
        ];
    }
}
