@extends('layouts.layoutMaster')

@section('title', 'Student Details')

@section('content')
  <h4>Student Details</h4>
  <p><strong>Name:</strong> {{ $student->name }}</p>
  <p><strong>Status ID:</strong> {{ $student->status_id }}</p>
@endsection
