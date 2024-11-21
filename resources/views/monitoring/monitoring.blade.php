@extends('layouts.adminLayout')

@section('title', 'Monitoring')

@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Monitoring</h1>
  <div class="bg-white p-6 rounded-lg shadow-lg" style="max-height: 700px; margin: auto;">
    <canvas id="myChart"></canvas>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <script>
    const ctx = document.getElementById('myChart');
  
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: {!! json_encode(['Andijon', 'Buxoro', 'Fargʻona', 'Jizzax', 'Xorazm', 'Namangan', 'Navoiy', 'Qashqadaryo', 'Qoraqalpogʻiston', 'Samarqand', 'Sirdaryo', 'Surxondaryo', 'Toshkent']) !!},
        datasets: [{
          label: 'Tasks Completed',
          data: [10, 15, 8, 12, 5, 7],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
@endsection
