<?php

use App\Http\Controllers\BookingController;
use App\Models\Booking;
use Carbon\Carbon;
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
    return redirect()->to(route('booking.produk'));
});

Route::match(['POST','GET'],'/booking', [BookingController::class, 'index'])->name('booking.index');

Route::get('/hasil', [BookingController::class, 'hasil']);

Route::get('/booking/produk', function () {
    return view('booking.produk');
})->name('booking.produk');

Route::get('/booking/tentang', function () {
    return view('booking.tentang');
})->name('booking.tentang');

Route::get('/booking/hasilAll', function () {
    return view('booking.hasilAll');
})->name('booking.hasilAll');

Route::get('/booking/chart', function () {
    // Retrieve all bookings
    $data = Booking::all();

    // Get the start and end dates of the current week
    $startOfWeek = Carbon::now()->startOfWeek();
    $endOfWeek = Carbon::now()->endOfWeek();

    // Retrieve bookings made within the current week
    $bookingsThisWeek = Booking::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();

    // Count the number of bookings made this week
    $bookingsThisWeekCount = $bookingsThisWeek->count();

    return view('booking.chart', compact('data', 'bookingsThisWeekCount'));
})->name('booking.chart');

Route::match(['GET'],'/get-chart', [BookingController::class, 'countBookingsByDays'])->name('get.chart');
