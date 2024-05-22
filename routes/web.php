<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\CollectorMiddleware;
use App\Http\Middleware\DonorMiddleware;
use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.index')->name('login');

Route::group(["prefix" => "auth", "as" => "auth."], function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
});

Route::group(["prefix" => "collector", "as" => "collector."], function () {
    Route::get('/', [DashboardController::class, 'collectorDashboard']);
})->middleware([CollectorMiddleware::class, 'auth']);

Route::group(["prefix" => "donor", "as" => "donor."], function () {
    Route::get('/', [DashboardController::class, 'donorDashboard']);
})->middleware([DonorMiddleware::class, 'auth']);
