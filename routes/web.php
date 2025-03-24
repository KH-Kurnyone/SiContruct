<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 
    Route::resource('users', UserController::class);
    Route::resource('company', CompanyController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('worker', WorkerController::class);
    Route::resource('expenditure', ExpenditureController::class);
    Route::resource('payment', PaymentController::class);
    Route::resource('report', ReportController::class);
});
 
require __DIR__.'/auth.php';
