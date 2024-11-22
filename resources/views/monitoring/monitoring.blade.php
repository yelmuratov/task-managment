@extends('layouts.adminLayout')

@section('title', 'Monitoring')
@php
    use App\Models\TaskArea;
    use App\Models\Category;

    $categories = Category::with('tasks')->get();
@endphp

@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Monitoring</h1>
  <div class="bg-white p-6 rounded-lg shadow-lg" style="max-height: 500px; width: 85%;">
    <canvas id="myChart" style="max-width: 100%;"></canvas>
  </div>
  <div class="table-responsive mt-4">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Regions</th>
          @foreach($categories as $category)
            <th>{{ $category->name }}</th>
          @endforeach
        </tr>
      </thead>
      <tbody>
        @foreach($regions as $region)
          <tr>
            <td>{{ $region->name }}</td>
            @foreach($categories as $category)
              <td>
                @php
                  $taskCount = TaskArea::where('area_id', $region->id)
                                       ->whereIn('task_id', $category->tasks->pluck('id'))
                                       ->count();
                @endphp
                <a href="{{ route('tasks.showByRegionAndCategory', ['region' => $region->id, 'category' => $category->id]) }}">
                  {{ $taskCount }}
                </a>
              </td>
            @endforeach
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <script>
    const ctx = document.getElementById('myChart').getContext('2d');
    ctx.canvas.style.width = '100%'; // Adjust the width of the chart to fit the container
    
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
