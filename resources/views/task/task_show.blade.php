@extends('layouts.adminLayout')

@section('title', 'Tasks')

@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Tasks for {{ $region->name }}</h1>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Title</th>
          <th>Performer</th>
          <th>Period</th>
          <th>Status</th>
          <th>File</th>
        </tr>
      </thead>
      <tbody>
        @foreach($tasks as $task)
          <tr>
            <td>{{ $task->title }}</td>
            <td>{{ $task->performer }}</td>
            <td>{{ $task->period }}</td>
            <td>{{ $task->status }}</td>
            <td>
              @if($task->file)
                <a href="{{ Storage::url($task->file) }}" target="_blank">View File</a>
              @else
                No File
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection