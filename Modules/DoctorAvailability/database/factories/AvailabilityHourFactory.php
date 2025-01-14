<?php

namespace Modules\DoctorAvailability\Database\Factories;

use Modules\DoctorAvailability\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class AvailabilityHourFactory extends Factory
{
    public function definition(): array
    {
        return [
            'doctor_id'  => Doctor::factory()->create()->id,
            'day'        => $this->faker->dayOfWeek,
            'start_time' => $this->faker->time(),
            'end_time'   => $this->faker->time()
        ];
    }
}
