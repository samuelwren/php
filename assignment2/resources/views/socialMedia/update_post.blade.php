@extends('layouts.master')

@section('title')
  Update Post
@endsection

@section('content')
    <h1>Update</h1>
    
    <div class="col-sm-3">
        <form method="post" action="/post/{{ $post->id }}">
          {{csrf_field()}}
          {{ method_field('PUT') }}
          
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
          <input type="hidden" name="id" value="{{ $post->id }}"> 
          <fieldset>
            <legend><span>Title</span></legend>
            <label>
              <input type="text" class="form-control" name="title" value="{{ $post->title }}"/>
            </label>
          </fieldset>
          <fieldset>
            <legend><span>Message</span></legend>
            <label>
              <input type="text" class="form-control" name="message" value="{{ $post->message }}"/>
            </label>
          </fieldset>
          <fieldset>
            <legend><span>Privacy</span></legend>
            <select name="privacy"> 
                @foreach($privacys as $privacy) 
                    <!-- Retrieves old values -->
                    @if($privacy->id === old('$privacy')) 
                        <option value="{{ $privacy->id }}" selected="selected">{{ $privacy->privacySetting }}</option> 
                    @else 
                        <option value="{{ $privacy->id }}">{{ $privacy->privacySetting }}</option> 
                    @endif 
                @endforeach
            </select>
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
