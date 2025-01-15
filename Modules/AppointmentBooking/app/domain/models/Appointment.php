<?php

namespace Modules\AppointmentBooking\domain\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['uuid', 'slot_id', 'patient_name', 'reserved_at'];

}
