<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;

// Debug: Log that routes are being loaded
\Route::get('/', function () {
    \Log::info('Home route hit');
    return 'Hospital Management System is working!';
})->name('home');

// Authentication Routes
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Patients
    Route::resource('patients', PatientController::class);
    Route::post('patients/{patient}/restore', [PatientController::class, 'restore'])->name('patients.restore');

    // Doctors
    Route::resource('doctors', DoctorController::class);
    Route::post('doctors/{doctor}/restore', [DoctorController::class, 'restore'])->name('doctors.restore');

    // Appointments
    Route::resource('appointments', AppointmentController::class);
    Route::post('appointments/{appointment}/restore', [AppointmentController::class, 'restore'])->name('appointments.restore');
});
