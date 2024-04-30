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

            // Inisialisasi variabel $total_bayar dengan nilai awal 0
            $total_bayar = 0;
            // Inisialisasi variabel $harga_kamar dengan nilai awal 0
            $harga_kamar = 0;
            if ($request->tipe_kamar === 'Standar') {
                $harga_kamar = 500000;
            }elseif ($request->tipe_kamar === 'Deluxe'){
                $harga_kamar = 750000;
            }else {
                $harga_kamar = 1000000;
            }
            
            // Mengambil nilai dari input "breakfast" dari form
            $breakfast = $request->breakfast;
            // dd($breakfast);
            if ($breakfast === '1') {
                // Menghitung total bayar dengan tambahan biaya breakfast jika dipilih
                $total_bayar = $harga_kamar * $request->durasi_menginap + 80000; 
            } else {
                // Menghitung total bayar tanpa tambahan biaya breakfast
                $total_bayar = $harga_kamar * $request->durasi_menginap;
            }
            
            if ($request->durasi_menginap >= 3) {
                // Memberikan diskon 10% jika durasi menginap lebih dari atau sama dengan 3 hari
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
        // Inisialisasi array kosong untuk menampung penghitungan sepanjang hari dalam seminggu
        $countsByDay = [
            'Sunday' => 0,
            'Monday' => 0,
            'Tuesday' => 0,
            'Wednesday' => 0,
            'Thursday' => 0,
            'Friday' => 0,
            'Saturday' => 0,
        ];

        // Mendapatkan tanggal mulai dan berakhir pada minggu ini
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        // Mengambil pemesanan yang dibuat dalam minggu ini
        $bookings = Booking::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();

        // Mengulangi pemesanan
        foreach ($bookings as $booking) {
            // mendapatkan nama hari pemesanan
            $dayName = Carbon::parse($booking->created_at)->setTimezone('Asia/Jakarta')->formatLocalized('%A');

            // meningkatkan hitungan untuk hari yang bersangkutan
            $countsByDay[$dayName]++;
        }

        // Mengembalikan array jumlah
        return Response::json($countsByDay);
    }
}
