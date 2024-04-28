@extends('layouts.master')

@section('content')

<!-- Content -->
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Tentang Kami</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-2">Selamat Datang di Hotel Kami</h2>
        <img src="{{ asset('images/hotel.jpg') }}" alt="Hotel XYZ" class="mb-4">
        <p class="text-gray-700 mb-4">Hotel Kami adalah tempat yang nyaman dan terjangkau untuk penginapan Anda. Dengan lokasi yang strategis dan fasilitas yang memadai, kami berusaha memberikan pengalaman menginap yang tak terlupakan bagi setiap tamu.</p>
        <p class="text-gray-700 mb-4">Alamat: Jl. Contoh No. 123, Kota Contoh, Indonesia</p>
        <p class="text-gray-700 mb-4">Telepon: (123) 456-7890</p>
        <p class="text-gray-700 mb-4">Email: info@hotelkami.com</p>
    </div>
</div>
@endsection