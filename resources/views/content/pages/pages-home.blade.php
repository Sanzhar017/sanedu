@extends('layouts/layoutMaster')


@section('title', 'Home')

@section('content')
  <h4>Home Page Students</h4>

  <a href="{{ route('students.create') }}" class="btn btn-primary">Create Students</a>

  <div class="card">
    <h5 class="card-header">Table Basic</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
        <tr>
          <th>Name</th>
          <th>Status ID</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody class="table-border-bottom-0">
        @foreach($students as $student)
          <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->status_id }}</td>
            <td>
              <!-- Ваш код для действий с каждым студентом, например, редактирование и удаление -->
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
