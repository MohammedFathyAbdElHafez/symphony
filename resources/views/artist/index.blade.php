@extends('layouts.app')

@section('content')
<div class="container">
         

<div class="add-artists">
<a href="{{ url('artists/create')}}" id="artist-create" class="badge badge-primary"> Add Artist</a> 
</div>


<h1 class="page-title" > Artists' List</h1>

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
        <a href="{{ url('artists/'.$artist->id)}}" class="btn btn-primary">View Artist</a>
      </div>
    </div>
  </div>


@endforeach
</div>

</div>
                @endsection
