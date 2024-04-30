@extends('layouts.master')

@section('content')

<div class="flex justify-center mx-auto p-32 items-center">
  <div class="w-full bg-white rounded-lg shadow p-4 md:p-6">
      <h1 class="text-2xl font-bold mb-4 text-center">Grafik Pesanan Minggu Ini</h1> <!-- Judul chart -->
      <div class="flex justify-between">
          <div>
              <h5 class="leading-none text-3xl font-bold text-gray-900 pb-2">{{ $bookingsThisWeekCount }}</h5>
              <p class="text-base font-normal text-gray-500">Pesanan masuk</p>
          </div>
      </div>
      <div id="area-chart"></div>
  </div>
</div>


@endsection

@section('script')
<script>
    function fetchBookingData() {
      return new Promise((resolve, reject) => {
        // memuat permintaan AJAX ke titik akhir server untuk mengambil data pemesanan
        fetch('{{ route('get.chart') }}') // memperbarui URL titik akhir 
          .then(response => {
            // meriksa apakah responsnya berhasil
            if (!response.ok) {
              throw new Error('Failed to fetch booking data');
            }
            // Parsing respons JSON
            return response.json();
          })
          .then(data => {
            console.log(data);
            // Resolve the promise with the retrieved data
            resolve(data);
          })
          .catch(error => {
            // Reject the promise with the error message
            reject(error);
          });
      });
    }
    
    // Berfungsi untuk merender grafik dengan data yang disediakan
    function renderChart(data) {
      // Chart options
      const dayNames = Object.keys(data);
      const bookingCounts = Object.values(data);
      const options = {
        chart: {
          height: "100%",
          maxWidth: "100%",
          type: "area",
          fontFamily: "Inter, sans-serif",
          dropShadow: {
            enabled: false,
          },
          toolbar: {
            show: false,
          },
        },
        tooltip: {
          enabled: true,
          x: {
            show: false,
          },
        },
        fill: {
          type: "gradient",
          gradient: {
            opacityFrom: 0.55,
            opacityTo: 0,
            shade: "#1C64F2",
            gradientToColors: ["#1C64F2"],
          },
        },
        dataLabels: {
          enabled: false,
        },
        stroke: {
          width: 6,
        },
        grid: {
          show: false,
          strokeDashArray: 4,
          padding: {
            left: 2,
            right: 2,
            top: 0
          },
        },
        series: [
          {
            name: "Bookings", // Dengan asumsi menampilkan pemesanan
            data: bookingCounts,
            color: "#1A56DB",
          },
        ],
        xaxis: {
          categories: dayNames,
          labels: {
            show: true,
          },
          axisBorder: {
            show: false,
          },
          axisTicks: {
            show: false,
          },
        },
        yaxis: {
          show: false,
        },
      };
    
      // Render the chart
      if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("area-chart"), options);
        chart.render();
      }
    }
    
    // mengambil data pemesanan dan render bagan saat memuat halaman
    document.addEventListener("DOMContentLoaded", () => {
      fetchBookingData()
        .then(data => {
          renderChart(data);
        })
        .catch(error => {
          console.error('Error fetching booking data:', error);
        });
    });
</script>
@endsection