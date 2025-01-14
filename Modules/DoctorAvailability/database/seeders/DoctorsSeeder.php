<?php

namespace Modules\DoctorAvailability\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\DoctorAvailability\Models\Doctor;

class DoctorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Doctor::factory()->count(1)->create();
    }
}
