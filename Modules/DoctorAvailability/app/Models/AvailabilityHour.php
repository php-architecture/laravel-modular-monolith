<?php

namespace Modules\DoctorAvailability\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\DoctorAvailability\Database\Factories\AvailabilityHourFactory;

class AvailabilityHour extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): AvailabilityHourFactory
    // {
    //     // return AvailabilityHourFactory::new();
    // }
}
