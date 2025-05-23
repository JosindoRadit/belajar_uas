<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\matkulController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// matkul routes
Route::get('/matkul', [matkulController::class, 'index'])->name('matkul.index');
Route::get('/matkul/create', [matkulController::class, 'create'])->name('matkul.create');
Route::post('/matkul', [matkulController::class, 'store'])->name('matkul.store');
Route::get('/matkul/{id}/edit', [matkulController::class, 'edit'])->name('matkul.edit');
Route::put('/matkul/{id}', [matkulController::class, 'update'])->name('matkul.update');
Route::delete('/matkul/{id}', [matkulController::class, 'destroy'])->name('matkul.destroy');

Route::resource('matkul', App\Http\Controllers\matkulController::class);

Route::resource('kelas', App\Http\Controllers\KelasController::class);
