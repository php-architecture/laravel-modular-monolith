<?php

namespace Modules\DoctorAvailability\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\DoctorAvailability\Database\Seeders\DoctorsSeeder;

class DoctorAvailabilityDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            DoctorsSeeder::class
        ]);
    }
}
