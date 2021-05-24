@extends('layouts.app')

@section('content')

  <div class="container">
      <stores :stores="{{ $stores }}" :categories="{{ $categories }}"/>
  </div>

@endsection
