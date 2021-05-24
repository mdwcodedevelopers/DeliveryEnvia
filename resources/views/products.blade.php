@extends('layouts.app')

@section('content')

  <div class="container">
      <products :products="{{ $products }}" :categories="{{ $categories }}" :stores="{{ $stores }}"/>
  </div>

@endsection
