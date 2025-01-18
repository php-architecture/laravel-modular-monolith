<?php

namespace Modules\DoctorAvailability\Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\DoctorAvailability\Database\Factories\AvailabilityHourFactory;
use Modules\DoctorAvailability\Database\Factories\DoctorFactory;
use Modules\DoctorAvailability\Models\AvailabilityHour;
use Tests\TestCase;

class DoctorAvailabilityTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_available_hours()
    {
        // Arrange
        AvailabilityHourFactory::new()->count(2)->create();

        // Act
        $response = $this->getJson('api/v1/doctor-availability/slots');

        // Assert
        $response->assertOk();

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'uuid',
                    'doctor_uuid',
                    'day',
                    'start_time',
                    'end_time',
                    'cost',
                    'is_reserved',
                    'created_at',
                    'updated_at',
                ],
            ],
        ]);

        $data = $response->json('data');

        $this->assertCount(2, $data);

        $this->assertFalse($data[0]['is_reserved']);
    }

    public function test_post_new_available_hour()
    {
        // Arrange
        $doctor = DoctorFactory::new()->create();

        // Act
        $response = $this->postJson('api/v1/doctor-availability/slots', [
            'day' => Carbon::tomorrow()->format('Y-m-d'),
            'start_time' => Carbon::tomorrow()->addHours(5)->format('H:i'),
            'end_time' => Carbon::tomorrow()->addHours(6)->format('H:i'),
            'doctor_uuid' => $doctor->uuid,
            'cost' => 350,
        ]);

        // Assert
        $response->assertCreated();

        $response->assertJson([
            'message' => 'Slot created successfully',
        ]);

        $this->assertCount(1, AvailabilityHour::all());
        $this->assertFalse(AvailabilityHour::first()->is_reserved);
    }
}
