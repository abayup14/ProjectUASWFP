<?php

use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HotelController::class, 'index'])->name('hotel');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::resource("hotel", HotelController::class);
Route::resource("product", ProductController::class);

//Route::get('/hotel/{id}', [App\Http\Controllers\HotelController::class, 'show']);
//Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'show']);



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', function () {
        return view('cart');
    })->name('cart');

    Route::get('/cart/add/{id}', [FrontEndController::class, 'addToCart'])->name('addCart');

    Route::get('/cart/delete/{id}', [FrontEndController::class, 'deleteFromCart'])->name('delFromCart');
    Route::post('/cart/addQty', [FrontEndController::class, 'addQuantity'])->name('addQty');
    Route::post('/cart/reduceQty', [FrontEndController::class, 'reduceQuantity'])->name('redQty');
    Route::post('/cart/addPoinUsed', [FrontEndController::class, 'addPoinUsed'])->name('addPoinUsed');
    Route::post('/cart/reducePoinUsed', [FrontEndController::class, 'reducePoinUsed'])->name('redPoinUsed');
});
Route::get('/newtransaction', [TransaksiController::class, 'store']);
