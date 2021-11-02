@extends('layouts.app')

@section('content')
<div class="container">
         

<div class="add-artists">
<a href="{{ url('shows/create')}}" id="show-create" class="badge badge-primary"> Add Show</a> 
</div>


<h1 class="page-title" > Shows' List</h1>

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
