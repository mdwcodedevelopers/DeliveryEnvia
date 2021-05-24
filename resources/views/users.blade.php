@extends('layouts.app')

@section('content')

  <div class="container">
      <users :users="{{ $users }}" :roles="{{ $roles }}"/>
  </div>

@endsection
