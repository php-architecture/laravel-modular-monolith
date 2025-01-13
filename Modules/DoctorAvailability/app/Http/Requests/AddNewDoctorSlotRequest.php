<?php

namespace Modules\DoctorAvailability\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddNewDoctorSlotRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'day' => ['required', 'date'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i', 'after:start_time'],
            'doctor_uuid' => ['required', 'uuid', Rule::exists('doctors', 'uuid')],
            'cost' => ['required', 'numeric', 'min:0'],
            'is_reserved' => ['nullable', 'boolean'],
        ];
    }
}
