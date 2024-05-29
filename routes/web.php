<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CollectorsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonationApprovedController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DonationRequestController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\StoryController;
use App\Http\Middleware\CollectorMiddleware;
use App\Http\Middleware\DonorMiddleware;
use App\Models\Announcement;
use App\Models\Province;
use App\Models\Story;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $stories = Story::latest()->get();
    $message = Announcement::latest()->first();
    return view('home.home', ['data' => $stories, 'message' => $message]);
});

Route::view('/verify', 'auth.verify');
Route::view('/blood-101', 'home.donation');
Route::view('/requirements', 'home.requirements');
Route::view('/schedule', 'home.schedule');

Route::view('/login', 'auth.login')->name('login');

Route::get('/register', function () {
    $address = Province::get();
    $address->load('districts.sectors.cells');
    return view('auth.register', ['address' => $address]);
})->name('register');

Route::group(["prefix" => "auth", "as" => "auth."], function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
});

Route::post('/donor-verify', [DonorController::class, 'verify']);

Route::group(["prefix" => "collector", "as" => "collector."], function () {
    Route::get('/', [DashboardController::class, 'collectorDashboard']);
    Route::view('/settings', 'auth.settings');
    Route::put('/settings', [AuthController::class, 'profile']);
    Route::resource('/collectors', CollectorsController::class)->only('index', 'store');
    Route::resource('/donors', DonorController::class)->only('index');
    Route::post('/donors/update', [DonorController::class, 'update']);
    Route::get('/collectors/delete/{id}', [CollectorsController::class, 'destroy']);
    Route::get('/donors/delete/{id}', [DonorController::class, 'destroy']);
    Route::resource('/donations', DonationController::class)->only('index', 'store');
    Route::get('/donations/delete/{id}', [DonationController::class, 'destroy']);
    Route::get('/donations-request', [DonationRequestController::class, 'index']);
    Route::post('/donation-request/approve', [DonationRequestController::class, 'approve']);
    Route::resource('/explore', StoryController::class)->only('index', 'store');
    Route::resource('/donations-approved', DonationApprovedController::class)->only('index');
    Route::get('/explore/delete/{id}', [StoryController::class, 'destroy']);
    Route::get('/report/donors', [DonorController::class, 'report']);
    Route::get('/announcement', [AnnouncementController::class, 'index']);
    Route::post('/announcement', [AnnouncementController::class, 'store']);
})->middleware([CollectorMiddleware::class]);

Route::group(["prefix" => "donor", "as" => "donor."], function () {
    Route::get('/', [DashboardController::class, 'donorDashboard']);
    Route::view('/settings', 'auth.settings');
    Route::put('/settings', [AuthController::class, 'profile']);
    Route::get('/donations', [DonationController::class, 'index']);
    Route::post('/donations', [DonationRequestController::class, 'store']);
    Route::get('/donations-requests', [DonationRequestController::class, 'donor']);
    Route::get('/donations-requests/delete/{id}', [DonationRequestController::class, 'destroy']);
})->middleware([DonorMiddleware::class, 'auth']);
