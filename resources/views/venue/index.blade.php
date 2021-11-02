@extends('layouts.app')

@section('content')
<div class="container">
         

<div class="add-artists">
<a href="{{ url('venues/create')}}" id="venue-create" class="badge badge-primary"> Add Venue</a> 
</div>


<h1 class="page-title" > Venues' List</h1>

<hr />


<div class="row">
 @foreach($venues as $venue)

                                    

  <div class="col-sm-4 artist-card">
    <div class="card">
      <div class="card-body">

      <form action="{{route('venues.destroy',[$venue->id])}}" method="POST">
 @csrf
 <input type="hidden" name="_method" value="DELETE">
 <button type="submit" class="delete-artist" style="float: right;">x</button>               
</form>


        <h5 class="card-title">{{ $venue->title }}</h5>
        <p class="card-text">Description: {{ $venue->description }}</p>
        <a href="{{ url('venues/'.$venue->id)}}" class="btn btn-primary">View Venue</a>
      </div>
    </div>
  </div>


@endforeach
</div>

</div>
                @endsection
