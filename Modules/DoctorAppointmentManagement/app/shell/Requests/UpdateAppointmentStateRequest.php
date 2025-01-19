<?php

namespace Modules\DoctorAppointmentManagement\shell\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAppointmentStateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'uuid'  => 'required|uuid|exists:appointments,uuid',
            'state' => 'required|string|in:completed,cancelled'
        ];
    }
}
