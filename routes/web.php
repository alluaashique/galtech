<?php

use App\Http\Middleware\AdminMiddleware;

//AdminController
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\ContactusController;



//UserController
use App\Http\Controllers\User\DepartmentController as UserDepartmentController;
use App\Http\Controllers\User\ContactusController as UserContactusController;
use App\Http\Controllers\User\HomeController as UserHomeController;


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



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

    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
    Route::get('/departments/{department}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
    Route::put('/departments/{department}', [DepartmentController::class, 'update'])->name('departments.update');
    Route::delete('/departments/{department}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

    Route::get('/contact-us', [ContactusController::class, 'index'])->name('contact-us.index');
    Route::get('/contact-us/create', [ContactusController::class, 'create'])->name('contact-us.create');
    Route::post('/contact-us', [ContactusController::class, 'store'])->name('contact-us.store');
    Route::get('/contact-us/{department}/edit', [ContactusController::class, 'edit'])->name('contact-us.edit');
    Route::put('/contact-us/{department}', [ContactusController::class, 'update'])->name('contact-us.update');
    Route::delete('/contact-us/{department}', [ContactusController::class, 'destroy'])->name('contact-us.destroy');
});




Route::get('/', [UserHomeController::class, 'index'])->name('index');
Route::get('/departments', [UserDepartmentController::class, 'index'])->name('departments.index');


require __DIR__.'/auth.php';
