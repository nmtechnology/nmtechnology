<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\EmailerRecipientController;
use App\Http\Controllers\VisitorStatsController;
use App\Http\Controllers\MathVerificationController;

// Main entry point - load Vue SPA
Route::middleware(['block.nonus'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    // Products route (previously /cctv)
    Route::get('/products', function () {
        return redirect('/');
    });

    // Backwards-compatible redirect for old /cctv URLs
    Route::get('/cctv', function () {
        return redirect('/products', 301);
    });

    // Test email page
    Route::get('/test-emails', function () {
        return response()->file(public_path('test-emails.html'));
    });

    // Math verification API route handled in routes/api.php
    // (Removed duplicate route to avoid confusion and CSRF conflicts)
});

// Admin emailer routes
Route::get('/admin/emailer/add', [EmailerRecipientController::class, 'create'])->name('emailer.create');
Route::post('/admin/emailer/add', [EmailerRecipientController::class, 'store'])->name('emailer.store');

// Visitor stats route
Route::get('/visitor-stats', [VisitorStatsController::class, 'index'])->middleware('auth');

// Route to trigger sending the traffic report email
Route::post('/send-traffic-report', [MathVerificationController::class, 'sendTrafficReport']);

// Catch all other routes and redirect to the root URL
Route::get('/{any?}', function () {
    return redirect('/');
})->where('any', '.*');
