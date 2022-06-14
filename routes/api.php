<?php

use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\SpecialtieController;
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

Route::apiResources([
    'pacientes' => PatientController::class,
    'especialidades' => SpecialtieController::class,
]);
