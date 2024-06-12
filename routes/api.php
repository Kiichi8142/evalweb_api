<?php

use App\Http\Controllers\AddEvaluationToEmployeeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SectionController;
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
});

Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::apiResource('/employees', EmployeeController::class)->middleware('admin');
    Route::apiResource('/templates', TemplateController::class)->middleware('admin');
    Route::apiResource('/questions', QuestionController::class)->middleware('admin');
    Route::apiResource('/sections', SectionController::class)->middleware('admin');
    Route::post('/templates/make/{template}', AddEvaluationToEmployeeController::class)->middleware('admin');
    Route::post('/templates/sections/{template}', [TemplateController::class, 'addSections'])->middleware('admin');
    Route::post('/templates/sections/{template}/rm', [TemplateController::class, 'removeSections'])->middleware('admin');
});
