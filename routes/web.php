<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\CollectorMiddleware;
use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.index')->name('login');

Route::group(["prefix" => "auth", "as" => "auth."], function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
});

Route::group(["prefix" => "collector", "as" => "collector."], function () {
    Route::view('/', 'welcome');
})->middleware([CollectorMiddleware::class, 'auth']);
