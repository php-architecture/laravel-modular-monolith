<?php

namespace Modules\DoctorAvailability\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\DoctorAvailability\Database\Factories\AvailabilityHourFactory;
use Modules\DoctorAvailability\Database\Factories\DoctorFactory;

class AvailabilityHour extends Model
{
    use HasFactory;

    protected static function newFactory(): AvailabilityHourFactory
    {
        return AvailabilityHourFactory::new();
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['uuid', 'doctor_uuid', 'day', 'start_time', 'end_time', 'cost', 'is_reserved'];

    protected $casts = [
        'day' => 'date',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'is_reserved' => 'boolean'
    ];

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'doctor_uuid', 'uuid');
    }

}
