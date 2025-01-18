<?php

namespace Modules\DoctorAvailability\Database\Factories;

use Illuminate\Support\Str;
use Modules\DoctorAvailability\Models\AvailabilityHour;
use Modules\DoctorAvailability\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class AvailabilityHourFactory extends Factory
{
    protected $model = AvailabilityHour::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid(),
            'doctor_uuid'  => Doctor::factory()->create()->uuid,
            'day'        => $this->faker->dayOfWeek,
            'start_time' => $this->faker->time(),
            'end_time'   => $this->faker->time(),
            'cost'=> $this->faker->numberBetween(30, 300),
        ];
    }
}
