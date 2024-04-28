<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Hotel</title>
    @vite('resources/css/app.css')  
    
    <nav class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex justify-between">
            <a href="#" class="text-xl font-bold">Booking Hotel</a>
            <ul class="flex space-x-4">
                <li><a href="{{ route('booking.produk') }}" class="hover:text-gray-300">Produk</a></li>
                <li><a href="{{ route('booking.harga') }}" class="hover:text-gray-300">Daftar Harga</a></li>
                <li><a href="{{ route('booking.tentang') }}" class="hover:text-gray-300">Tentang Kami</a></li>
                <li><a href="{{ route('booking.index') }}" class="hover:text-gray-300">Booking Form</a></li>
            </ul>
        </div>
    </nav>

</head>
    @yield('content')
</body>
</html>
</body>
</html>
