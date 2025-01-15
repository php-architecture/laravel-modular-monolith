<?php

use Illuminate\Support\Facades\Route;
use Modules\AppointmentBooking\Http\Controllers\AppointmentBookingController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
 */

// Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
//     Route::apiResource('appointmentbooking', AppointmentBookingController::class)->names('appointmentbooking');
// });

Route::group(['prefix' => 'v1/book-appointment'], function () {
    Route::get('/available-hours', [AppointmentBookingController::class, 'getAvailableHours']);
    Route::post('/book', [AppointmentBookingController::class, 'bookAppointment']);
});
