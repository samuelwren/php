@extends('layouts.master')

@section('title')
  Update Post
@endsection

@section('content')
    <h1>Update</h1>
    
    <div class="col-sm-3">
        <form method="post" action="/editPost_action">
          {{csrf_field()}}
          <input type="hidden" name="id" value="{{ $post->id }}"> 
          <fieldset>
            <legend><span>Title</span></legend>
            <label>
              <input type="text" class="form-control" name="title" value="{{ $post->title }}"/>
            </label>
          </fieldset>
          <fieldset>
            <legend><span>UserName</span></legend>
            <label>
              <input type="text" class="form-control" name="userName" value="{{ $post->userName }}"/>
            </label>
          </fieldset>
          <fieldset>
            <legend><span>Message</span></legend>
            <label>
              <input type="text" class="form-control" name="message" value="{{ $post->message }}"/>
            </label>
          </fieldset>
          <br>
          
          <!-- Cancel button that goes back to the home page -->
          <a href = "{{url("/") }}">
              <button type="button" class="btn btn-warning glyphicon glyphicon-minus-sign"></button>
          </a>
          
          <!-- The Update Button -->
          <button class="btn btn-primary">Update</button>
        </form>
      </div>
    
@endsection
