<?php

namespace Modules\DoctorAppointmentManagement\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\AppointmentBooking\domain\models\Appointment;
use Tests\TestCase;

class DoctorAppointmentManagementTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_get_get_all_upcoming_appointments(): void
    {
        Appointment::factory()->create([
            'date' => now()->tomorrow(),
            'state' => 'upcoming',
        ]);
        Appointment::factory()->create(['date' => now()->yesterday()]);
        Appointment::factory()->create(['state' => $this->faker->randomElement(['completed', 'cancelled'])]);

        // Act
        $response = $this->getJson('api/v1/appointment-management/appointment');

        // Assert
        $response->assertOk();

        $response->assertJsonStructure([
            '*' => [
                'uuid',
                'slot_id',
                'patient_name',
                'state',
                'reserved_at',
                'date',
                'created_at',
                'updated_at',
            ],
        ]);

        $this->assertCount(1, $response->json());
    }

    public function test_post_update_appointment_state(): void
    {
        // Arrange
        $appointment = Appointment::factory()->create([
            'date' => now()->tomorrow(),
            'state' => 'upcoming',
        ]);

        $updatedState = $this->faker->randomElement(['completed', 'cancelled']);

        // Act
        $response = $this->putJson('api/v1/appointment-management/appointment', [
            'uuid' => $appointment->uuid,
            'state' => $updatedState,
        ]);

        // Assert
        $response->assertOk();

        $response->assertJson([
            'message' => 'Appointment updated successfully',
        ]);

        $this->assertEquals(Appointment::first()->state, $updatedState);
    }
}
