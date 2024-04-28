@extends('layouts.master')

@section('content')
<body class="bg-gray-100">
    <!-- Content -->
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Daftar Harga</h1>
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full table-auto">
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
</body>
@endsection