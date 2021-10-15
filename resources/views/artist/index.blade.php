@extends('layouts.app')

@section('content')



@foreach($artists as $artist)
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{ $artist->name }}</h5>
    <p class="card-text">{{ $artist->contact }}</p>
    <p class="card-text">{{ $artist->tool }}</p>
    
    <a href="{{ url('artists/'.$artist->id)}}" class="btn btn-primary">Show Artist</a>
  </div>
</div>
@endforeach
@endsection
