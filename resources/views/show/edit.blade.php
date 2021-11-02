@extends('layouts.app')

@section('content')
<div class="container">

<div class="edit-form">

<h1 class="page-title" > Edit an Show</h1>

<hr />

<form method="POST" action="{{route('shows.update',[$show->id])}}">
@csrf
<input type="hidden" name="_method" value="PUT">

  <div class="form-group">
    <label for="title">Show Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{$show->title}}" placeholder="Enter title">
  </div>

  <div class="form-group">
    <label for="description">Show description</label>
    <input type="text" class="form-control" id="description" value="{{$show->description}}" name="description"  placeholder="Enter description">
  </div>

  <div class="form-group">
    <label for="artistId">Choose an Artist</label>
    <select class="form-control" id="artistId" name="artist_id">
    @foreach($artists as $artist)
      <option    value="{{$artist->id}}" <?php if($show->artist_id == $artist->id) echo 'selected'; ?>   >{{$artist->name}}</option>  $show->artist_id
      @endforeach
    </select>
      </div>

      <div class="form-group">
    <label for="venueId">Choose a Venue</label>   
    <select class="form-control" id="venueId" name="venue_id">
    @foreach($venues as $venue)
      <option value="{{$venue->id}}"  <?php if($show->venue_id == $venue->id) echo 'selected'; ?> >{{$venue->title}}</option>
      @endforeach
    </select>
      </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
</div>


@endsection
