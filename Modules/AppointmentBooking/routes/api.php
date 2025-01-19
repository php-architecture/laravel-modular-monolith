<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1/book-appointment'], function () {
    Route::get('/available-hours', \Modules\AppointmentBooking\api\getAllAvailableHoursController::class);
    Route::post('/book', \Modules\AppointmentBooking\api\CreateAppointmentController::class);
});
