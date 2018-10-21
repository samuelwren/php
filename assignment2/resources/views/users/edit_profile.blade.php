@extends('layouts.master')

@section('title')
  Update Post
@endsection

@section('content')
    <h1>Update</h1>
    
    <!-- FORM for update -->
    <div class="col-sm-3">
        <form method="POST" action="/user/{{ $user->id }}" enctype="multipart/form-data">
          {{csrf_field()}}
          {{ method_field('PUT') }}
          
          <input type="hidden" name="id" value="{{ Auth::user()->id }}">
          <fieldset>
            <legend><span>First Name</span></legend>
            <label>
              <input type="text" class="form-control" name="firstName" value="{{ $user->firstName }}"/>
            </label>
          </fieldset>
          <fieldset>
            <legend><span>Last Name</span></legend>
            <label>
              <input type="text" class="form-control" name="lastName" value="{{ $user->lastName }}"/>
            </label>
          </fieldset>
          <fieldset>
            <legend><span>Image</span></legend>
            <label>
              <input type="file" name="image"/>
            </label>
          </fieldset>
          <fieldset>
            <legend><span>Year of Birth</span></legend>
            <label>
              <input type="date" class="form-control" name="dob" value="{{ $user->dob }}"/>
            </label>
          </fieldset>
          <br>
          
          <!-- Cancel button that goes back to the home page -->
          <a href = "/user/{{$user->id}}">
              <button type="button" class="btn btn-warning glyphicon glyphicon-minus-sign"></button>
          </a>
          
          <!-- The Update Button -->
          <button class="btn btn-primary">Update</button>
        </form>
      </div>
    
@endsection
