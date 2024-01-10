@extends('layouts.layoutMaster')

@section('title', 'Student Orders')

@section('content')
  <h4>Student Orders</h4>

  <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Create Order</a>

  <table class="table">
    <thead>
    <tr>
      <th>ID</th>
      <th>Student</th>
      <th>Order Type</th>
      <th>Order Number</th>
      <th>Order Date</th>
      <th>Title</th>
      <th>Old Status</th>
      <th>Current Status</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($orders as $order)
      <tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->student->name }}</td>
        <td>{{ $order->orderType->name }}</td>
        <td>{{ $order->order_number }}</td>
        <td>{{ $order->order_date }}</td>
        <td>{{ $order->title }}</td>
        <td>{{ $order->oldStatus->name }}</td>
        <td>{{ $order->currentStatus->name }}</td>
        <td>
          <div class="btn-group" role="group" aria-label="Order Actions">
            <a href="{{ route('student.orders.show', ['student' => $order->student, 'order' => $order->id]) }}" class="btn btn-info">View</a>
            <a href="{{ route('student.orders.edit', ['student' => $order->student, 'order' => $order->id]) }}" class="btn btn-warning">Edit</a>
            <form method="POST" action="{{ route('orders.destroy', ['student' => $order->student, 'order' => $order->id]) }}" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this order?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </div>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
@endsection
