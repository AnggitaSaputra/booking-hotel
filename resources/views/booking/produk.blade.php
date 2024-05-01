@extends('layouts.master')

@section('content')

<!-- Hero Section -->
<div class="bg-gray-800 text-white py-20 px-4">
    <div class="container mx-auto text-center">
        <h1 class="text-4xl font-bold mb-4">Selamat Datang di Hotel Kami</h1>
        <p class="text-lg mb-6">Nikmati pengalaman menginap yang tak terlupakan</p>
        <a href="/booking" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-full">Booking Sekarang!</a>
    </div>
</div>
<!-- Services Section -->
<div class="bg-gray-100 py-12">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-center">Layanan Kami</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-semibold mb-4">Spa & Wellness</h3>
                <p class="text-gray-700 mb-4">Nikmati layanan spa yang menenangkan dan program kesehatan yang lengkap.</p>
                <a href="#" class="text-blue-500 hover:underline">Baca Selengkapnya</a>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-semibold mb-4">Restoran & Kafe</h3>
                <p class="text-gray-700 mb-4">Jelajahi berbagai hidangan lezat dari masakan lokal hingga internasional di restoran kami.</p>
                <a href="#" class="text-blue-500 hover:underline">Baca Selengkapnya</a>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-semibold mb-4">Ruang Pertemuan</h3>
                <p class="text-gray-700 mb-4">Kami menyediakan fasilitas ruang pertemuan yang nyaman untuk keperluan bisnis atau acara spesial Anda.</p>
                <a href="#" class="text-blue-500 hover:underline">Baca Selengkapnya</a>
            </div>
        </div>
    </div>
</div>

<!-- Products Section -->
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Produk</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        <!-- Standar -->
        <div class="bg-white p-4 rounded-lg shadow">
            <img src="{{ asset('images/standar.jpg') }} " alt="Standar" class="w-full h-40 object-cover rounded-lg mb-2">
            <h2 class="text-xl font-semibold mb-2">Standar Room</h2>
            <p class="text-gray-700 mb-2">Kamar standar dengan fasilitas dasar untuk penginapan yang nyaman.</p>
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/A83syCB5LJs?si=hRgZ2_925PUy-YRF" title="Standar Room" frameborder="0" allowfullscreen></iframe>
            <div class="flex justify-between items-center mt-2">
                <span class="text-gray-600 font-semibold">Rp 500.000 / malam</span>
                <a href="{{ asset('images/standar.jpg') }}" class="text-blue-500 hover:underline">Lihat Detail</a>
            </div>
        </div>
        <!-- Deluxe -->
        <div class="bg-white p-4 rounded-lg shadow">
            <img src="{{ asset('images/deluxe.jpeg') }}" alt="Deluxe" class="w-full h-40 object-cover rounded-lg mb-2">
            <h2 class="text-xl font-semibold mb-2">Deluxe Room</h2>
            <p class="text-gray-700 mb-2">Kamar mewah dengan fasilitas tambahan untuk penginapan yang lebih nyaman.</p>
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/V0ZmEre9PIU?si=xxPEvmscZTFg6TnQ" title="Deluxe Room" frameborder="0" allowfullscreen></iframe>
            <div class="flex justify-between items-center mt-2">
                <span class="text-gray-600 font-semibold">Rp 750.000 / malam</span>
                <a href="{{ asset('images/deluxe.jpeg') }}" class="text-blue-500 hover:underline">Lihat Detail</a>
            </div>
        </div>
        <!-- Executive -->
        <div class="bg-white p-4 rounded-lg shadow">
            <img src="{{ asset('images/executive.jpg') }}" alt="Executive" class="w-full h-40 object-cover rounded-lg mb-2">
            <h2 class="text-xl font-semibold mb-2">Executive Room</h2>
            <p class="text-gray-700 mb-2">Kamar mewah dengan fasilitas premium untuk penginapan yang mewah.</p>
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/tsgctLYxnWI?si=9K4bS3jdnmWpkc15" title="Executive Room" frameborder="0" allowfullscreen></iframe>
            <div class="flex justify-between items-center mt-2">
                <span class="text-gray-600 font-semibold">Rp 1.000.000 / malam</span>
                <a href="{{ asset('images/executive.jpg') }}" class="text-blue-500 hover:underline">Lihat Detail</a>
            </div>
        </div>
    </div>
</div>
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Daftar Harga</h1>
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full table-auto mx-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2">Tipe Kamar</th>
                    <th class="px-4 py-2">Harga per Malam</th>
                    <th class="px-4 py-2">Fasilitas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border px-4 py-2">Standar</td>
                    <td class="border px-4 py-2">Rp 500.000</td>
                    <td class="border px-4 py-2">AC, TV</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">Deluxe</td>
                    <td class="border px-4 py-2">Rp 750.000</td>
                    <td class="border px-4 py-2">AC, TV, WIFI</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">Suite</td>
                    <td class="border px-4 py-2">Rp 1.000.000</td>
                    <td class="border px-4 py-2">AC, TV, WIFI, Living Room</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>

@endsection
