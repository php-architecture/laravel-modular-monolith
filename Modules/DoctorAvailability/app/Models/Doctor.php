<?php

namespace Modules\DoctorAvailability\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// use Modules\DoctorAvailability\Database\Factories\DoctorFactory;

class Doctor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'uuid',
        'name',
        'phone',
        'address',
        'status',
        'price'
    ];

    // protected static function newFactory(): DoctorFactory
    // {
    //     // return DoctorFactory::new();
    // }
}
