<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BookingController extends Controller
{

    public function index(Request $request)
    {
        if($request->isMethod('GET') ) {
            return view('booking.index');
        }

        if($request->isMethod('POST')) {

            $request->validate([
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'nomor_identitas' => 'required',
                'tipe_kamar' => 'required',
                'tanggal_pesan' => 'required',
                'durasi_menginap' => 'required',
            ]);

            $total_bayar = 0;
            $harga_kamar = 0;
            if ($request->tipe_kamar === 'Standar') {
                $harga_kamar = 500000;
            }elseif ($request->tipe_kamar === 'Deluxe'){
                $harga_kamar = 750000;
            }else {
                $harga_kamar = 1000000;
            }
            
            $breakfast = $request->breakfast;
            // dd($breakfast);
            if ($breakfast === '1') {
                $total_bayar = $harga_kamar * $request->durasi_menginap + 80000;
            } else {
                $total_bayar = $harga_kamar * $request->durasi_menginap;
            }
            
            if ($request->durasi_menginap >= 3) {
                $total_bayar -= $total_bayar * 0.1;
            }
            $data = [
                'nama' => $request->nama,
                'jenis_kelamin'=> $request->jenis_kelamin,
                'nomor_identitas'=> $request->nomor_identitas,
                'tipe_kamar'=> $request->tipe_kamar,
                'tanggal_pesan'=> $request->tanggal_pesan,
                'durasi_menginap'=> $request->durasi_menginap,
                'breakfast'=> $breakfast,
                'total_bayar'=> $total_bayar,
            ];

            $create = Booking::create($data);

            if(!$create){
                return redirect()->back()->with('error', 'Failed to create data');
            }

            return redirect()->back()->with('success', 'data created successfully');
        }
    }
    function countBookingsByDays()
    {
        // Initialize an empty array to hold the counts for all days of the week
        $countsByDay = [
            'Sunday' => 0,
            'Monday' => 0,
            'Tuesday' => 0,
            'Wednesday' => 0,
            'Thursday' => 0,
            'Friday' => 0,
            'Saturday' => 0,
        ];

        // Get the start and end dates of the current week
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        // Retrieve bookings made within the current week
        $bookings = Booking::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();

        // Loop through the bookings
        foreach ($bookings as $booking) {
            // Get the day name of the booking
            $dayName = Carbon::parse($booking->created_at)->setTimezone('Asia/Jakarta')->formatLocalized('%A');

            // Increment the count for the corresponding day
            $countsByDay[$dayName]++;
        }

        // Return the counts array
        return Response::json($countsByDay);
    }
}
