<?php

namespace Modules\DoctorAvailability\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AvailabilityHourFactory extends Factory
{
    public function definition(): array
    {
        return [
            'doctor_id' => $this->faker->numberBetween(1, 10),
            'day' => $this->faker->dayOfWeek,
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
        ];
    }
}
