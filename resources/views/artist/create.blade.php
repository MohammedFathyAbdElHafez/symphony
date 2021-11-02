@extends('layouts.app')

@section('content')
<div class="container">

<div class="edit-form">

<h1 class="page-title" > Creat an Artist</h1>

<hr />
<form method="POST" action="{{ url('artists') }}">
@csrf

  <div class="form-group">
    <label for="name">Artist Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="contact" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>


  <div class="form-group">
    <label for="tool">Artist tool</label>
    <input type="text" class="form-control" id="tool" name="tool" placeholder="Enter tool">
  </div>


      <div class="form-group">
      <label for="venueId">Choose a Venue or Venues</label>
    <select multiple class="form-control" id="venueId" name="venue_id[]">
    @foreach($venues as $venue)
    <option value="{{$venue->id}}">{{$venue->title}}</option>
      @endforeach
    </select>
      </div>




  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
</div>


@endsection
