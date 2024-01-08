@extends('layouts.layoutMaster')

@section('title', 'Edit Student')

@section('content')
  <h4>Edit Student</h4>

  <form method="POST" action="{{ route('students.update', ['student' => $student->id]) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="name" class="form-label">Name:</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
    </div>

    <div class="mb-3">
      <label for="student_id" class="form-label">Student ID:</label>
      <input type="text" class="form-control" id="student_id" name="student_id" value="{{ $student->student_id }}" required>
    </div>

    <!-- Добавьте другие поля, если необходимо -->

    <button type="submit" class="btn btn-primary">Update Student</button>
  </form>
@endsection
