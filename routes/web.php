<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

// Main entry point - load Vue SPA
Route::get('/', function () {
    return view('welcome');
});

// Direct CCTV route
Route::get('/cctv', function () {
    return view('welcome');
});

// Catch all other routes and redirect to the SPA to handle them
Route::get('/{any?}', function () {
    return view('welcome');
})->where('any', '.*');
