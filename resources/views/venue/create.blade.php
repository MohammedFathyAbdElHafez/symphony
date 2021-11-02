@extends('layouts.app')

@section('content')
<div class="container">

<div class="edit-form">

<h1 class="page-title" > Creat a Venue</h1>

<hr />
<form method="POST" action="{{ url('venues') }}">
@csrf

  <div class="form-group">
    <label for="title">Venue Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
  </div>

  <div class="form-group">
    <label for="description">Venue description</label>
    <input type="textarea" class="form-control" id="description" name="description" placeholder="Enter description">
  </div>


  <div class="form-group">
      <label for="artistId">Choose an Artist or Artists</label>
    <select multiple class="form-control" id="artistId" name="artist_id[]">
    @foreach($artists as $artist)
    <option value="{{$artist->id}}">{{$artist->name}}</option>
      @endforeach
    </select>
      </div>




  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
</div>


@endsection
