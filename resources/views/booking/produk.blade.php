@extends('layouts.master')

@section('content')
<body>
<!-- Content -->
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
</body>
@endsection