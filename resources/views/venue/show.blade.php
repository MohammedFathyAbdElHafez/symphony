@extends('layouts.app')

@section('content')
<div class="container">
         

<div class="add-artists">
<a href="{{route('venues.edit',[$venue->id])}}" id="artist-create" class="badge badge-primary"> Edit Venue</a> 

</div>


<h1 class="page-title" > {{ $venue->title }} </h1>

<hr />


<div class="row">
                           
  <div class="col-md-12 artist-card">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $venue->title }}</h5>
        <p class="card-text">description: {{ $venue->description }}</p>

      </div>
    </div>
  </div>
</div>




<hr />

<h2 class="page-title" > Venue's Artists List</h2>

<hr />


<div class="row">
 @foreach($artists as $artist)
  <div class="col-sm-4 artist-card">
    <div class="card">
      <div class="card-body">

      <form action="{{route('artists.destroy',[$artist->id])}}" method="POST">
 @csrf
 <input type="hidden" name="_method" value="DELETE">
 <button type="submit" class="delete-artist" style="float: right;">x</button>               
</form>


        <h5 class="card-title">{{ $artist->name }}</h5>
        <p class="card-text">Contact: {{ $artist->contact }}</p>
        <p class="card-text">Tool: {{ $artist->tool }}</p>
        <a href="{{ url('artists/'.$artist->id)}}" class="btn btn-primary">View Artist</a>


      </div>
    </div>
  </div>


@endforeach
</div>


<h2 class="page-title" > Venue's Show List</h2>

<hr />


<div class="row">
 @foreach($shows as $show)
  <div class="col-sm-4 artist-card">
    <div class="card">
      <div class="card-body">

      <form action="{{route('shows.destroy',[$show->id])}}" method="POST">
 @csrf
 <input type="hidden" name="_method" value="DELETE">
 <button type="submit" class="delete-artist" style="float: right;">x</button>               
</form>


        <h5 class="card-title">{{ $show->title }}</h5>
        <p class="card-text">Description: {{ $show->description }}</p>
        <a href="{{ url('shows/'.$show->id)}}" class="btn btn-primary">View Show</a>

      </div>
    </div>
  </div>


@endforeach
</div>















</div>
                @endsection
