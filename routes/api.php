<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DocumentUploadController;
use App\Http\Controllers\MathVerificationController;
use App\Services\VisitorReportService;

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
Route::post('/contact', [MailController::class, 'send']); // Alternative route for frontend
Route::post('/orders/submit', [OrderController::class, 'submit']);
Route::post('/applications', [ApplicationController::class, 'submit']);
Route::post('/upload-document', [DocumentUploadController::class, 'upload']);
Route::post('/verify-math', [MathVerificationController::class, 'verify']);
Route::post('/log-action', [MathVerificationController::class, 'logAction']);
Route::post('/left-site', [MathVerificationController::class, 'leftSite']);
Route::post('/survey-response', [MailController::class, 'sendSurveyResponse']);
Route::post('/survey-responses', [MailController::class, 'sendSurveyResponses']);

// Test route for email templates
Route::get('/test-emails', [ApplicationController::class, 'sendTestEmails']);
Route::get('/test-contact-email', [MailController::class, 'sendTestContactEmail']);

// Visitor Report API endpoints (for manual triggering)
Route::prefix('reports')->group(function () {
    Route::get('/daily', function () {
        $success = VisitorReportService::sendDailyReport();
        return response()->json([
            'success' => $success,
            'message' => $success ? 'Daily report sent successfully' : 'Failed to send daily report'
        ]);
    });
    
    Route::get('/weekly', function () {
        $success = VisitorReportService::sendWeeklyReport();
        return response()->json([
            'success' => $success,
            'message' => $success ? 'Weekly report sent successfully' : 'Failed to send weekly report'
        ]);
    });
    
    Route::get('/monthly', function () {
        $success = VisitorReportService::sendMonthlyReport();
        return response()->json([
            'success' => $success,
            'message' => $success ? 'Monthly report sent successfully' : 'Failed to send monthly report'
        ]);
    });
    
    Route::get('/all', function () {
        $results = [
            'daily' => VisitorReportService::sendDailyReport(),
            'weekly' => VisitorReportService::sendWeeklyReport(),
            'monthly' => VisitorReportService::sendMonthlyReport(),
        ];
        return response()->json([
            'success' => $results['daily'] && $results['weekly'] && $results['monthly'],
            'results' => $results
        ]);
    });
});