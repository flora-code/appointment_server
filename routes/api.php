<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



/****************************************Appointment routes************************************************/
Route::get('appointments',[AppointmentController::class,'getAppointments']);
Route::post('appointment',[AppointmentController::class,'postAppointment']);
Route::get('appointment/{appointmentId}',[AppointmentController::class,'getAppointment']);
Route::put('appointment/{appointmentId}',[AppointmentController::class,'putAppointment']);
Route::delete('appointment/{appointmentId}',[AppointmentController::class,'deleteAppointment']);

/****************************************User routes************************************************/
Route::get('users',[UserController::class,'getUsers']);
Route::post('user',[UserController::class,'postUser']);
Route::get('user/{userId}',[UserController::class,'getUser']);
Route::put('user/{userId}',[UserController::class,'putUser']);
Route::delete('user/{userId}',[UserController::class,'deleteUser']);


/****************************************Midwife routes************************************************/
Route::get('midwives',[MidwifeController::class,'getMidwives']);
Route::post('midwife',[MidwifeController::class,'postMidwife']);
Route::get('midwife/{midwifeId}',[MidwifeController::class,'getMidwife']);
Route::put('midwife/{midwifeId}',[MidwifeController::class,'putMidwife']);
Route::delete('midwife/{midwifeId}',[MidwifeController::class,'deleteMidwife']);
