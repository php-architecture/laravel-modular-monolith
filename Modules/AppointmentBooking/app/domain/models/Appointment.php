<?php

namespace Modules\AppointmentBooking\domain\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\AppointmentBooking\app\database\factories\AppointmentFactory;
use Modules\DoctorAvailability\Models\AvailabilityHour;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['uuid', 'slot_id', 'patient_name', 'reserved_at', 'date'];

    protected static function newFactory(): AppointmentFactory
    {
        return AppointmentFactory::new();
    }

    public function availabilityHour(): BelongsTo
    {
        return $this->belongsTo(AvailabilityHour::class, 'slot_id', 'uuid');
    }
}
