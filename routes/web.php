<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShoeController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\UserCartController;
use App\Http\Controllers\UserFavouriteController;
use App\Http\Controllers\UserCheckoutController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
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
    Route::get('/shoe', [ShoeController::class, 'index'])->name('shoe.index');
    Route::post('/shoe', [ShoeController::class, 'store'])->name('shoe.store');
    Route::get('/show', [ShoeController::class, 'show'])->name('shoe.show');
    Route::get('/shoe/{id}', [ShoeController::class, 'details'])->name('shoe.details');
});

Route::middleware('auth')->group(function () {
    Route::get('/outlet/create', [OutletController::class, 'store'])->name('outlet.store');
    Route::view('/outlet', 'outlet.index')->name('outlet.index');
    Route::get('/outlet', [OutletController::class, 'show'])->name('outlet.index');
    Route::post('/outlet', [OutletController::class, 'store'])->name('files.store');

    Route::get('/outlet/create', [OutletController::class, 'upload'])->name('upload');
    Route::get('/outlet', [OutletController::class, 'index'])->name('outlet.index');
    Route::post('/outlet', [OutletController::class, 'store'])->name('outlet.store');
});

Route::post('/userCart', [UserCartController::class, 'store'])->name('userCart.store');
Route::get('/cart', [UserCartController::class, 'showCart'])->name('cart');
Route::delete('/cart/{id}', [UserCartController::class, 'remove'])->name('cart.remove');

Route::post('/userFav', [UserFavouriteController::class, 'store'])->name('userFav.store');
Route::get('/favourites', [UserFavouriteController::class, 'showFav'])->name('favourites.show');
Route::delete('/userFav/{id}', [UserFavouriteController::class, 'remove'])->name('userFav.remove');

Route::get('/checkout', [UserCheckoutController::class, 'showItems'])->name('checkout');

require __DIR__.'/auth.php';
