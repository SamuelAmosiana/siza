<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Public SIZA Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/universities', [UniversityController::class, 'index'])->name('universities.index');
Route::get('/universities/{university}', [UniversityController::class, 'show'])->name('universities.show');

Route::get('/programmes', [ProgrammeController::class, 'index'])->name('programmes.index');

Route::get('/apply', [ApplicationController::class, 'create'])->name('apply.create');
Route::post('/apply', [ApplicationController::class, 'store'])->name('apply.store');

// Dashboard & Auth (Created by Breeze)
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
