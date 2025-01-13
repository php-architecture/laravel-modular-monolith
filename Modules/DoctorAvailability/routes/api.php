<?php

use Illuminate\Support\Facades\Route;
use Modules\DoctorAvailability\Http\Controllers\AddNewDoctorSlotController;
use Modules\DoctorAvailability\Http\Controllers\getAllDoctorSlotsController;

Route::group(['prefix' => 'v1/doctor-availability'], function () {
    Route::get('/slots', getAllDoctorSlotsController::class);
    Route::post('/slots' , AddNewDoctorSlotController::class);
});
