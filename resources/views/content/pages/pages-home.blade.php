@extends('layouts.layoutMaster')
@extends('layouts.app')
@section('title', 'Home')

@section('content')
  <h4>Home Page Students ❤️</h4>
  {{ $students->links() }}


  <a href="{{ route('students.create') }}" class="btn btn-primary">Create Students</a>

  <div class="card">
    <h5 class="card-header">Table Students </h5>
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
              <a class="dropdown-item" href="{{ route('students.edit', ['student' => $student->id]) }}">
                <i class="ti ti-pencil me-2"></i> Edit
              </a>
              <form action="{{ route('students.destroy', ['student' => $student->id]) }}" method="post" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this student?')">
                  <i class="ti ti-trash me-2"></i> Delete
                </button>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <p class="mt-3">Найдено {{ $students->total() }} записей</p>

@endsection
