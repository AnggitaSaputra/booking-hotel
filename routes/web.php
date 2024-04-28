<?php

use App\Http\Controllers\BookingController;
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

Route::match(['POST','GET'],'/booking', [BookingController::class, 'index'])->name('booking.index');

Route::get('/booking/produk', function () {
    return view('booking.produk');
})->name('booking.produk');

Route::get('/booking/harga', function () {
    return view('booking.harga');
})->name('booking.harga');

Route::get('/booking/tentang', function () {
    return view('booking.tentang');
})->name('booking.tentang');