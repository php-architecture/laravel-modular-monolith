<?php

namespace Modules\AppointmentConfirmation\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\AppointmentBooking\Events\AppointmentCreated;
use Modules\AppointmentConfirmation\Listeners\AppointmentConfirmation;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array<string, array<int, string>>
     */
    protected $listen = [
        AppointmentCreated::class => [
            AppointmentConfirmation::class
        ]
    ];

    /**
     * Indicates if events should be discovered.
     *
     * @var bool
     */
    protected static $shouldDiscoverEvents = true;

    /**
     * Configure the proper event listeners for email verification.
     */
    protected function configureEmailVerification(): void
    {
        //
    }
}
