<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProviderController;

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
    Route::get('/booking/create',[BookingController::class,'dashboard']);
    Route::post('/booking/store',[BookingController::class,'store']);
    Route::get('/booking/bookings',[BookingController::class,'bookings']);
    Route::get('/provider/dashboard',[ProviderController::class,'dashboard',]);
    Route::patch('/provider/bookings/{id}/status',[ProviderController::class,'status']);
});
Route::middleware(['auth', AdminMiddleware::class])->group(function() {
    Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('/admin/users',[AdminController::class, 'users']);
    Route::delete('/admin/users/{id}',[AdminController::class,'delete']);
    Route::patch('/admin/users/{id}/role',[AdminController::class,'updateRole']);
   
    });

require __DIR__.'/auth.php';
