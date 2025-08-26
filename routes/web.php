<?php

use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\AppointmentController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\DepartmentsController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProjectsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// frontend part
// about part
Route::get('about',[AboutController::class, 'index'])->name('about');

// contact part
Route::get('contact',[ContactController::class, 'index'])->name('contact');

// departments part
Route::get('departments',[DepartmentsController::class, 'index'])->name('departments');

// appintment part
Route::get('appointment',[AppointmentController::class, 'index'])->name('appointment');

// projects part
Route::get('projects',[ProjectsController::class, 'index'])->name('projects');