<?php

namespace Modules\DoctorAvailability\Repositories;

use Str;
use Modules\DoctorAvailability\Models\AvailabilityHour;

class AvailabilityHourRepository
{

    public function getAll()
    {
        return AvailabilityHour::all();
    }

    public function getAllAvailableHours()
    {
        return AvailabilityHour::where('is_reserved', false)->get();
    }

    public function create($data)
    {
        return AvailabilityHour::create(array_merge($data, [
            'uuid' => Str::uuid(),
            'is_reserved' => false
        ]));
    }

    public function bookSlot($id): AvailabilityHour
    {
        return tap(AvailabilityHour::where('uuid', $id)->first(), function ($instance) {
            $instance->update(['is_reserved' => 1]);
        });
    }

}
