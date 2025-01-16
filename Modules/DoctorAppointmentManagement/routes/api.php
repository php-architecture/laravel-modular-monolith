<?php

use Illuminate\Support\Facades\Route;
use Modules\DoctorAppointmentManagement\shell\controllers\UpdateAppointmentStateController;
use Modules\DoctorAppointmentManagement\Http\Controllers\DoctorAppointmentManagementController;
use Modules\DoctorAppointmentManagement\shell\controllers\GetAllUpcomingAppointmentsController;

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

Route::group(['prefix' => 'v1/appointment-management'], function () {
    Route::get('/appointment', GetAllUpcomingAppointmentsController::class);
    Route::post('/appointment', UpdateAppointmentStateController::class);
});
