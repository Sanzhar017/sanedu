@extends('layouts.layoutMaster')

@section('title', 'Student Details')

@section('content')
  <h4>Student Details</h4>
  <p><strong>Name:</strong> {{ $order->id }}</p>
  <p><strong>Status ID:</strong> {{ $order->status_id }}</p>
@endsection
