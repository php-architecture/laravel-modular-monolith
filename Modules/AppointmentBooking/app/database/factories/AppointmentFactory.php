<?php

namespace Modules\AppointmentBooking\app\database\factories;

use Illuminate\Support\Str;
use Modules\AppointmentBooking\domain\models\Appointment;
use Modules\DoctorAvailability\Models\AvailabilityHour;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'slot_id'=> AvailabilityHour::factory()->create()->uuid,
            'patient_name' => $this->faker->name,
            'state' => $this->faker->randomElement(['upcoming', 'completed', 'cancelled']),
            'reserved_at' => now(),
            'date' => now()->nextWeekday(),
        ];
    }
}


