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
      labels: {!! json_encode(array_keys($regionNames)) !!},
      datasets: [{
        label: 'Tasks Completed',
        data: {!! json_encode(array_values($regionNames)) !!},
        borderWidth: 1
      }]
      },
      options: {
      scales: {
        y: {
        beginAtZero: true,
        ticks: {
          stepSize: 1
        }
        }
      }
      }
    });
    </script>
@endsection
