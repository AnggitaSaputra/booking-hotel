@extends('layouts.master')

@section('content')
<div class="container mx-auto">
    <div class="container mx-auto">
        <div class="mt-8">
            <h2 class="text-center text-3xl font-semibold mb-4">Latest Booking</h2>
            @if($data['latestBooking'] !== null)
            <div class="bg-white shadow-md rounded overflow-hidden mx-auto" style="max-width: 400px;">
            <table class="min-w-100 divide-y divide-gray-200">
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <th class="text-left px-6 py-3 bg-gray-100">Nama Pemesan</th>
                        <td class="text-left px-6 py-3">{{ $data['latestBooking']->nama }}</td>
                    </tr>
                    <tr>
                        <th class="text-left px-6 py-3 bg-gray-100">Nomor Identitas</th>
                        <td class="text-left px-6 py-3">{{ $data['latestBooking']->nomor_identitas }}</td>
                    </tr>
                    <tr>
                        <th class="text-left px-6 py-3 bg-gray-100">Jenis Kelamin</th>
                        <td class="text-left px-6 py-3">{{ $data['latestBooking']->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th class="text-left px-6 py-3 bg-gray-100">Tipe Kamar</th>
                        <td class="text-left px-6 py-3">{{ $data['latestBooking']->tipe_kamar }}</td>
                    </tr>
                    <tr>
                        <th class="text-left px-6 py-3 bg-gray-100">Durasi Penginapan</th>
                        <td class="text-left px-6 py-3">{{ $data['latestBooking']->durasi_menginap }} Hari</td>
                    </tr>
                    <tr>
                        <th class="text-left px-6 py-3 bg-gray-100">Diskon</th>
                        <td class="text-left px-6 py-3">
                            @if($data['isDiskon'])
                            10%
                            <!-- Tampilkan informasi tentang diskon -->
                            @else
                            -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="text-left px-6 py-3 bg-gray-100">Total Price</th>
                        <td class="text-left px-6 py-3">{{ number_format($data['latestBooking']->total_bayar, 0, ',', '.') }}</td>
                    </tr>                   
                </tbody>
            </table>
        </div>
        @else
        <p class="text-center mt-4">Tidak ada data pemesanan.</p>
        @endif
    </div>
</div>

@endsection
