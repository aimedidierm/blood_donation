<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonationController;
use App\Http\Middleware\CollectorMiddleware;
use App\Http\Middleware\DonorMiddleware;
use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.index')->name('login');

Route::group(["prefix" => "auth", "as" => "auth."], function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
});

Route::get('/chat', function () {
    return 'Welcom on chat';
});

Route::group(["prefix" => "collector", "as" => "collector."], function () {
    Route::get('/', [DashboardController::class, 'collectorDashboard']);
    Route::view('/settings', 'auth.settings');
    Route::put('/settings', [AuthController::class, 'profile']);
})->middleware([CollectorMiddleware::class, 'auth']);

Route::group(["prefix" => "donor", "as" => "donor."], function () {
    Route::get('/', [DashboardController::class, 'donorDashboard']);
    Route::view('/settings', 'auth.settings');
    Route::put('/settings', [AuthController::class, 'profile']);
    Route::get('/donations', [DonationController::class, 'index']);
})->middleware([DonorMiddleware::class, 'auth']);
