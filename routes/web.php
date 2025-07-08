<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\PengumpulanTugasController;

Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Authenticated routes
Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'dosen') {
            return view('dashboard.dosen');
        } else {
            return view('dashboard.mahasiswa');
        }
    })->name('dashboard');

    // Tugas (resourceful) - pakai parameter supaya {tugas} bukan {tuga}
    Route::resource('/tugas', TugasController::class)->parameters([
        'tugas' => 'tugas'
    ]);

    // Mahasiswa - pengumpulan tugas
    Route::get('/tugas-kuliah', [PengumpulanTugasController::class, 'index'])->name('pengumpulan.index');
    Route::get('/tugas-kuliah/{id}/kumpul', [PengumpulanTugasController::class, 'create'])->name('pengumpulan.create');
    Route::post('/tugas-kuliah/{id}', [PengumpulanTugasController::class, 'store'])->name('pengumpulan.store');

    // Dosen - lihat hasil pengumpulan
    Route::get('/tugas/{id}/pengumpulan', [PengumpulanTugasController::class, 'lihatKumpulan'])->name('pengumpulan.lihat');
});
