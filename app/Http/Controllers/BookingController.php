<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\Cast\Bool_;

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
}
