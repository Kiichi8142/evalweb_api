<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EvaluationItemController;
use App\Http\Controllers\TeacherEvaluationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::apiResource('/evaluations', EvaluationController::class);
    Route::post('/evaluations/sections/{evaluation}', [EvaluationController::class, 'addSections']);
    Route::apiResource('/items', EvaluationItemController::class);
    Route::apiResource('/employees', EmployeeController::class);
});
