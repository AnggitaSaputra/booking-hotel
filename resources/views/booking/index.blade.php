@extends('layouts.master')

@section('content')

    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-center">Form Pemesanan Kamar Hotel</h1>
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                {{ session('error') }}
            </div>
        @endif
        
        {{-- Form start --}}
        <form action="{{ route('booking.index') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama:</label>
                <input type="text" id="nama" name="nama" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
            <div class="mb-4">
                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin:</label>
                <select name="jenis_kelamin" id="jenis_kelamin" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="nomor_identitas" class="block text-sm font-medium text-gray-700">Nomor Identitas (Maksimal 16 Karakter):</label>
                <input type="number" id="nomor_identitas" name="nomor_identitas" required oninput="validateIdentityNumber()" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                <div id="nomor_identitas_error" class="text-red-500"></div>
            </div>            
            <div class="mb-4">
                <label for="tipe_kamar" class="block text-sm font-medium text-gray-700">Tipe Kamar:</label>
                <select name="tipe_kamar" id="tipe_kamar" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                    <option value="Standar">Standar</option>
                    <option value="Deluxe">Deluxe</option>
                    <option value="Family">Family</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="tanggal_pesan" class="block text-sm font-medium text-gray-700">Tanggal Pesan (Format: dd/mm/yyyy):</label>
                <input type="date" id="tanggal_pesan" name="tanggal_pesan" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
            <div class="mb-4">
                <label for="durasi_menginap" class="block text-sm font-medium text-gray-700">Durasi Menginap (hari):</label>
                <input type="number" id="durasi_menginap" name="durasi_menginap" required class="mt-1 p-2 border border-gray-300 rounded-md w-full" min="1">
            </div>                    
            <div class="mb-4">
                <input type="checkbox" id="breakfast" name="breakfast" value="1" class="mr-2">
                <label for="breakfast" class="text-sm font-medium text-gray-700">Pilih Breakfast</label>
            </div>
            <div class="mb-4">
                <label for="total_bayar" class="block text-sm font-medium text-gray-700">Total Pembayaran:</label>
                <input type="text" id="total_bayar" name="total_bayar" readonly class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
            <div id="diskon_info" class="text-sm text-green-800 mb-4"></div>            
            <div class="mb-4">
                <button type="button" id="hitungPembayaran" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mr-2">Hitung Pembayaran</button>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mr-2">Simpan</button>
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600" onclick="window.location.href='{{ route('booking.index') }}'">Batal</button>
            </div>            
        </form>
    </div>

    <script>

        
document.addEventListener('DOMContentLoaded', function() {
        var nomorIdentitasInput = document.getElementById('nomor_identitas');

        nomorIdentitasInput.addEventListener('input', function() {
            // Menghapus spasi dan karakter non-digit dari input
            var nomorIdentitas = this.value.replace(/\D/g, '');

            // Memastikan input memiliki tepat 16 digit angka
            if (nomorIdentitas.length !== 16) {
                // Menampilkan pesan jika tidak memenuhi persyaratan
                this.setCustomValidity('Isian salah. Data harus 16 digit');
            } else {
                // Menghapus pesan jika input sesuai
                this.setCustomValidity('');
            }
        });
    });
        function validateIdentityNumber() {
            var identityNumber = document.getElementById("nomor_identitas").value;
        
            // Hapus karakter selain angka
            var cleaned = identityNumber.replace(/\D/g, '');
        
            // Batasi panjang input maksimal menjadi 16 karakter
            if (cleaned.length !== 16) {
                document.getElementById("nomor_identitas").value = cleaned.slice(0, 16);
                document.getElementById("nomor_identitas_error").innerText = "Identity number must be exactly 16 characters.";
                // Men-disable tombol simpan jika identitas tidak valid
                document.getElementById("submitBtn").disabled = true;
            } else {
                document.getElementById("nomor_identitas_error").innerText = "";
                // Mengaktifkan kembali tombol simpan jika identitas valid
                document.getElementById("submitBtn").disabled = false;
            }
        }
        
        // Menambahkan event listener untuk tombol 'hitungPembayaran'
        document.getElementById('hitungPembayaran').addEventListener('click', function() {
            // Mengambil nilai durasi menginap dari input dengan id 'durasi_menginap'
            var durasiMenginap = document.getElementById('durasi_menginap').value;
        
            // Mengambil nilai tipe kamar dari select dengan id 'tipe_kamar'
            var tipeKamar = document.getElementById('tipe_kamar').value;
        
            // Inisialisasi variabel totalBayar dengan nilai awal 0
            var totalBayar = 0;
        
            // Kondisi untuk menghitung total biaya berdasarkan tipe kamar yang dipilih
            if (tipeKamar === 'Standar') {
                totalBayar = durasiMenginap * 500000;
            } else if (tipeKamar === 'Deluxe') {
                totalBayar = durasiMenginap * 750000;
            } else if (tipeKamar === 'Family') {
                totalBayar = durasiMenginap * 1000000;
            }
        
            // Memeriksa apakah checkbox sarapan di-check
            var isBreakfastChecked = document.getElementById('breakfast').checked;
        
            // Jika checkbox sarapan di-check, tambahkan biaya sarapan (Rp 80.000) ke totalBayar
            if (isBreakfastChecked) {
                totalBayar += 80000;
            }
        
            // Jika durasi menginap lebih dari atau sama dengan 3 hari, berikan diskon 10%
            if (durasiMenginap >= 3) {
                totalBayar *= 0.9;
                // Tampilkan teks diskon
                document.getElementById('diskon_info').innerText = "Anda mendapatkan diskon 10%";
            } else {
                // Kosongkan teks diskon jika durasi tidak memenuhi syarat
                document.getElementById('diskon_info').innerText = "";
            }
        
            // Menetapkan nilai total bayar ke input dengan id 'total_bayar' dengan format 'Rp ' + totalBayar
            document.getElementById('total_bayar').value = 'Rp ' + totalBayar.toLocaleString();
        });
        
        
        </script>
        
@endsection
