<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

// Main entry point - load Vue SPA
Route::get('/', function () {
    return view('welcome');
});

// Direct CCTV route
Route::get('/cctv', function () {
    return redirect('/');
});

// Catch all other routes and redirect to the root URL
Route::get('/{any?}', function () {
    return redirect('/');
})->where('any', '.*');
