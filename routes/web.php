<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FoodScanController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/scan', [FoodScanController::class, 'index'])->name('food.scan');

Route::middleware('auth')->group(function () {
    // Route::post('/scan/result', [FoodScanController::class, 'scan'])->name('scan.result');
    Route::post('/scan/result', [FoodScanController::class, 'scan'])->name('scan.result');
    Route::get('/scan/{id}', [FoodScanController::class, 'show'])->name('scan.show');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/settings', [ProfileController::class, 'settings'])->name('settings.edit');
});

require __DIR__ . '/auth.php';
