@extends('layouts.master')

@section('content')
    <div class="flex justify-center py-auto container mx-auto p-32 items-center">
        <div class="w-full bg-white rounded-lg shadow p-4 md:p-6">
            <div class="flex justify-between">
            <div>
                <h5 class="leading-none text-3xl font-bold text-gray-900 pb-2">{{ $bookingsThisWeekCount }}</h5>
                <p class="text-base font-normal text-gray-500">Pesanan minggu ini</p>
            </div>
            </div>
            <div id="area-chart"></div>
            </div>
        </div>        
    </div>

@endsection

@section('script')
<script>
    function fetchBookingData() {
      return new Promise((resolve, reject) => {
        // Make an AJAX request to the server endpoint to retrieve booking data
        fetch('{{ route('get.chart') }}') // Update the endpoint URL accordingly
          .then(response => {
            // Check if the response is successful
            if (!response.ok) {
              throw new Error('Failed to fetch booking data');
            }
            // Parse the JSON response
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
    
    // Function to render the chart with the provided data
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
            name: "Bookings", // Assuming you're displaying bookings
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
    
    // Fetch booking data and render chart on page load
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