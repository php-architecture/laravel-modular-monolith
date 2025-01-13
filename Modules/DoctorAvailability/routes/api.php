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

// Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
//     Route::apiResource('doctoravailability', DoctorAvailabilityController::class)->names('doctoravailability');
// });

Route::group(['prefix' => 'v1/doctor-availability'], function () {

    // list all doctors slots
    Route::get('/slots', function () {

    });

    // create a new doctor slot
    Route::post('/slots', function () {

    });

    // update a doctor slot
    Route::put('/slots/{id}', function () {

    });

});
