@extends('layouts.master')

@section('content')
<div class="container">
    
    <div class="container mx-auto">
        <h2 class="mt-4 text-center font-bold text-2xl">Booking List</h2>

        <a href="/booking" class="btn btn-primary mb-4 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">+ Tambah Pesanan</a>

        <table class="table-auto w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Gender</th>
                    <th class="px-4 py-2">Identity Number</th>
                    <th class="px-4 py-2">Room Type</th>
                    <th class="px-4 py-2">Booking Date</th>
                    <th class="px-4 py-2">Duration of Stay</th>
                    <th class="px-4 py-2">Total Price</th>
                </tr>
            </thead>
            <tbody>
                @php $counter = 1 @endphp
                @foreach($booking as $b)
                <tr>
                    <td class="px-4 py-2 border border-gray-300">{{ $counter++ }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $b->nama }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $b->jenis_kelamin }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $b->nomor_identitas }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $b->tipe_kamar }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $b->tanggal_pesan }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $b->durasi_menginap }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $b->total_bayar }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection