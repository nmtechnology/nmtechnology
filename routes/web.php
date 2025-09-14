<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\EmailerRecipientController;
use App\Http\Controllers\VisitorStatsController;
use App\Http\Controllers\MathVerificationController;

// Main entry point - load Vue SPA
Route::get('/', function () {
    return view('welcome');
});

// Direct CCTV route
Route::get('/cctv', function () {
    return redirect('/');
});

// Admin emailer routes
Route::get('/admin/emailer/add', [EmailerRecipientController::class, 'create'])->name('emailer.create');
Route::post('/admin/emailer/add', [EmailerRecipientController::class, 'store'])->name('emailer.store');

// Visitor stats route
Route::get('/visitor-stats', [VisitorStatsController::class, 'index'])->middleware('auth');

// Math verification API endpoint
Route::post('/verify-math', [MathVerificationController::class, 'verify']);

// Catch all other routes and redirect to the root URL
Route::get('/{any?}', function () {
    return redirect('/');
})->where('any', '.*');
