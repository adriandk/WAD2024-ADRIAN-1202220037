<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    $nav = 'Dashboard';
    return view('dashboard', compact('nav'));
})->name('dashboard');

Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');

Route::get('/dosen/create', [DosenController::class, 'getCreateForm'])->name('dosen.create');

Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');

Route::get('/dosen/{dosen}', [DosenController::class, 'show'])->name('dosen.show');

Route::get('/dosen/{dosen}/edit', [DosenController::class, 'getEditForm'])->name('dosen.edit');

Route::put('/dosen/{dosen}', [DosenController::class, 'update'])->name('dosen.update');

Route::delete('/dosen/{dosen}', [DosenController::class, 'destroy'])->name('dosen.destroy');



Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');

Route::get('/mahasiswa/create', [MahasiswaController::class, 'getCreateForm'])->name('mahasiswa.create');

Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');

Route::get('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');

Route::get('/mahasiswa/{mahasiswa}/edit', [MahasiswaController::class, 'getEditForm'])->name('mahasiswa.edit');

Route::put('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');

Route::delete('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
