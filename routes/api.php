<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EvaluationItemController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TemplateController;
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
});

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::apiResource('/employees', EmployeeController::class)->middleware('admin');
    Route::apiResource('/teams', TeamController::class)->middleware('admin');
});

Route::prefix('v1')->group(function () {
    Route::apiResource('/templates', TemplateController::class);
    Route::apiResource('/questions', QuestionController::class);
    Route::apiResource('/sections', SectionController::class);
});
