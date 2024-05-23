<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CollectorsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\StoryController;
use App\Http\Middleware\CollectorMiddleware;
use App\Http\Middleware\DonorMiddleware;
use App\Models\Story;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $stories = Story::latest()->get();
    return view('auth.index', ['data' => $stories]);
})->name('login');

Route::group(["prefix" => "auth", "as" => "auth."], function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
});

Route::get('/chat', function () {
    return 'Welcom on chat';
})->middleware('auth');

Route::group(["prefix" => "collector", "as" => "collector."], function () {
    Route::get('/', [DashboardController::class, 'collectorDashboard']);
    Route::view('/settings', 'auth.settings');
    Route::put('/settings', [AuthController::class, 'profile']);
    Route::resource('/collectors', CollectorsController::class)->only('index', 'store');
    Route::resource('/donors', DonorController::class)->only('index');
    Route::post('/donors/update', [DonorController::class, 'update']);
    Route::get('/collectors/delete/{id}', [CollectorsController::class, 'destroy']);
    Route::get('/donors/delete/{id}', [DonorController::class, 'destroy']);
    Route::get('/donations', [DonationController::class, 'index']);
    Route::resource('/explore', StoryController::class)->only('index', 'store');
    Route::get('/explore/delete/{id}', [StoryController::class, 'destroy']);
})->middleware([CollectorMiddleware::class, 'auth']);

Route::group(["prefix" => "donor", "as" => "donor."], function () {
    Route::get('/', [DashboardController::class, 'donorDashboard']);
    Route::view('/settings', 'auth.settings');
    Route::put('/settings', [AuthController::class, 'profile']);
    Route::get('/donations', [DonationController::class, 'index']);
})->middleware([DonorMiddleware::class, 'auth']);
