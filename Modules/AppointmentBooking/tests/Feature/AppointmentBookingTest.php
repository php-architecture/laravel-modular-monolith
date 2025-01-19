<?php

namespace Modules\AppointmentBooking\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Modules\AppointmentBooking\domain\models\Appointment;
use Modules\AppointmentBooking\Events\AppointmentCreated;
use Modules\DoctorAvailability\Database\Factories\AvailabilityHourFactory;
use Tests\TestCase;

class AppointmentBookingTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_all_available_hours(): void
    {
        // Arrange
        $nonReservedAvailableHour = AvailabilityHourFactory::new()->create(['is_reserved' => false]);
        $reservedAvailableHour = AvailabilityHourFactory::new()->create(['is_reserved' => true]);

        // Act
        $response = $this->getJson('api/v1/book-appointment/available-hours');

        // Assert
        $response->assertOk();

        $response->assertJsonStructure([
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
        ]);

        $this->assertCount(1, $response->json());

        $this->assertTrue($reservedAvailableHour->is_reserved);
    }

    public function test_post_update_appointment_state(): void
    {
        Event::fake([AppointmentCreated::class]);

        // Arrange
        $slotId = AvailabilityHourFactory::new()->create()->uuid;

        // Act
        $response = $this->postJson('api/v1/book-appointment/book', [
            'slot_id' => $slotId,
            'patient_name' => 'John Doe',
        ]);

        // Assert
        $response->assertCreated();

        $response->assertJson([
            'message' => 'Appointment created successfully',
        ]);

        $this->assertCount(1, Appointment::all());
        $this->assertEquals('upcoming', Appointment::first()->state);

        Event::assertDispatched(AppointmentCreated::class);

        // todo assert log
    }
}
