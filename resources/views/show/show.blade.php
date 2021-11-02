@extends('layouts.app')

@section('content')
<div class="container">
         

<div class="add-artists">
<a href="{{route('shows.edit',[$show->id])}}" id="artist-create" class="badge badge-primary"> Edit Show</a> 

</div>


<h1 class="page-title" > {{ $show->title }} </h1>

<hr />


<div class="row">
                           
  <div class="col-md-12 artist-card">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $show->title }}</h5>
        <p class="card-text">Contact: {{ $show->description }}</p>

      </div>
    </div>
  </div>
</div>

</div>
                @endsection
