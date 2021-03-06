<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ConsultationController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\PlanController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\ProceedingController;
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

Route::get('/', function () {
    return response()->json(['messenge' => 'Bem-vindo a API da ti.saude']);
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('registro', 'register');
});

Route::middleware('jwt.api')->group(function () {
    Route::apiResources([
        'pacientes' => PatientController::class,
        'especialidades' => SpecialtieController::class,
        'procedimentos' => ProceedingController::class,
        'planos' => PlanController::class,
        'medicos' => DoctorController::class,
        'consultas' => ConsultationController::class,
    ]);
    Route::get('me', [AuthController::class, 'me']);
});
