@extends('layouts.layoutMaster')

@section('title', 'Edit Student Order')

@section('content')
  <h4>Edit Student Order</h4>

  <form method="POST" action="{{ route('orders.update', ['student' => $order->student, 'order' => $order->id]) }}">
    @csrf
    @method('PUT')
    <button type="submit" class="btn btn-primary">Update Order</button>
  </form>
@endsection
