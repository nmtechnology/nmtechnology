<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MathVerificationController;

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

Route::post('/send-contact', [MailController::class, 'send']);
Route::post('/orders/submit', [OrderController::class, 'submit']);
Route::post('/verify-math', [MathVerificationController::class, 'verify']);
Route::post('/survey-response', [MailController::class, 'sendSurveyResponse']);
