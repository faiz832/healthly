<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FoodScanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BmiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/scan', [FoodScanController::class, 'index'])->name('food.scan');
Route::get('/terms', function () {
    return view('terms');
});
Route::get('/privacy', function () {
    return view('privacy');
});

Route::middleware('auth')->group(function () {
    // food scan route
    Route::post('/scan/result', [FoodScanController::class, 'scan'])->name('scan.result');
    Route::get('/scan/{id}', [FoodScanController::class, 'show'])->name('scan.show');

    // BMI route
    Route::get('/bmi', [BmiController::class, 'index'])->name('bmi.index');
    Route::get('/bmi/create', [BmiController::class, 'create'])->name('bmi.create');
    Route::post('/bmi', [BmiController::class, 'store'])->name('bmi.store');

    // dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/settings', [ProfileController::class, 'settings'])->name('settings.edit');
});

require __DIR__ . '/auth.php';
