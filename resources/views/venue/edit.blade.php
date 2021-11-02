@extends('layouts.app')

@section('content')
<div class="container">

<div class="edit-form">

<h1 class="page-title" > Edit an Venue</h1>

<hr />

<form method="POST" action="{{route('venues.update',[$venue->id])}}">
@csrf
<input type="hidden" name="_method" value="PUT">

  <div class="form-group">
    <label for="title">Venue Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{$venue->title}}" placeholder="Enter title">
  </div>

  <div class="form-group">
    <label for="description">Venue description</label>
    <input type="text" class="form-control" id="description" value="{{$venue->description}}" name="description"  placeholder="Enter description">
  </div>


  <div class="form-group">
      <label for="venueId">Choose an Artist or Artists</label>
      
    <select multiple class="form-control" id="venueId" name="venue_id[]">
    @foreach($artists as $artist)
    <option value="{{$artist->id}}" <?php if($artistvenues->contains($artist->id)) echo 'selected'; ?>     >{{$artist->name}}</option>
      @endforeach
    </select>
      </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
</div>


@endsection
