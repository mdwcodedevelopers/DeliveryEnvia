@extends('layouts.app')

@section('content')

  <div class="container">
      <companies :company="{{ $company }}"/>
  </div>

@endsection
