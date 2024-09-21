<?php

use App\Http\Middleware\AdminMiddleware;

//AdminController
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TreatmentController;


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/treatments', [TreatmentController::class, 'index'])->name('treatments.index');
    Route::get('/treatments/create', [TreatmentController::class, 'create'])->name('treatments.create');
    Route::post('/treatments', [TreatmentController::class, 'store'])->name('treatments.store');
    Route::get('/treatments/{treatment}/edit', [TreatmentController::class, 'edit'])->name('treatments.edit');
    Route::put('/treatments/{treatment}', [TreatmentController::class, 'update'])->name('treatments.update');
    Route::delete('/treatments/{treatment}', [TreatmentController::class, 'destroy'])->name('treatments.destroy');

});




require __DIR__.'/auth.php';
