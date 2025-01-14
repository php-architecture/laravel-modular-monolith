<?php

namespace Modules\DoctorAvailability\Database\Factories;

use Illuminate\Support\Str;
use Modules\DoctorAvailability\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'uuid'    => Str::uuid(),
            'name'    => $this->faker->name,
            'phone'   => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'status'  => $this->faker->randomElement(['active', 'inactive'])
        ];
    }
}
