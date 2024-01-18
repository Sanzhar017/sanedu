@extends('layouts.layoutMaster')

@section('title', 'Edit Student Order')

@section('content')
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <h4>Student Orders Edit</h4>
  <div>
  </div>
@endsection
