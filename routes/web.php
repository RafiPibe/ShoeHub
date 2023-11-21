<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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

Route::middleware('auth')->group(function () {
    Route::get('/form', [ShoeController::class, 'index'])->name('form.index');
    Route::post('/form', [ShoeController::class, 'store'])->name('form.store');
    Route::get('/show', [ShoeController::class, 'show'])->name('form.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/outlet/create', [outletController::class, 'store'])->name('outlet.store');
    Route::view('/outlet', 'outlet.index')->name('outlet.index');
    Route::get('/outlet', [outletController::class, 'show'])->name('outlet.index');
    Route::post('/outlet', [outletController::class, 'store'])->name('files.store');

    Route::get('/outlet/create', [outletController::class, 'upload'])->name('upload');
    Route::get('/outlet', [outletController::class, 'index'])->name('outlet.index');
    Route::post('/outlet', [outletController::class, 'store'])->name('outlet.store');
});

require __DIR__.'/auth.php';
