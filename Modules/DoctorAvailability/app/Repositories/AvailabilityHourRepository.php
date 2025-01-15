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
            'uuid'        => Str::uuid(),
            'is_reserved' => false
        ]));
    }

    public function bookSlot($id)
    {
        return AvailabilityHour::find($id)->update([
            'is_reserved' => true
        ]);
    }

}
