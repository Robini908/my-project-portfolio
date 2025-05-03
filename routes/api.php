<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AIController;

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

// AI Feature Routes
Route::prefix('ai')->group(function () {
    Route::post('/summarize', [AIController::class, 'summarize']);
    Route::post('/analyze-image', [AIController::class, 'analyzeImage']);
    Route::post('/explain-code', [AIController::class, 'explainCode']);
    Route::post('/analyze-sentiment', [AIController::class, 'analyzeSentiment']);
    Route::post('/analyze-skills', [AIController::class, 'analyzeSkills']);
    Route::post('/analyze-career-path', [AIController::class, 'analyzeCareerPath']);
    Route::post('/recommend-tech-stack', [AIController::class, 'recommendTechStack']);
});
