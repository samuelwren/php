@extends('layouts.master')

@section('title') 
    Social Media
@endsection

@section('content')

<div class="col-sm-3">
       
    <form method="post" action="addPost_action">
        {{csrf_field()}}
        <fieldset>
            <legend><span>Title</span></legend>
            <label>
                <input type="text" class="form-control" name="title" placeholder="Insert a Title Here!"/>
            </label>
        </fieldset>
        <fieldset>
            <legend><span>UserName</span></legend>
            <label>
                <input type="text" class="form-control" name="userName" placeholder="Insert Username Here!"/>
            </label>
        </fieldset>
        <fieldset>
            <legend><span>Message</span></legend>
            <label>
                <input type="text" class="form-control" name="message" placeholder="Insert Message Here!"/>
            </label>
        </fieldset>
        <br>
        <button class="btn btn-primary">Post</button>
    </form>

</div>

<div class="col-sm-8" >
    
    @if($posts)
        <ul>
            <!-- Displays each post in the database -->
            @foreach($posts as $post)
                <div class="card card-block">
                  <input type="hidden" name="id" value="{{ $post->id }}"> 
                  <h2><strong>{{$post->title}}</strong></h2>
                  <h2>{{$post->userName}}</h2>
                  <small class="col-sm-3 close">
                      <!-- Deletes the Post -->
                    <a href = "{{url("delete_post/$post->id") }}">
                        <button type="button" class="btn btn-danger glyphicon glyphicon-trash"></button>
                    </a>
                  </small>
                  <small class="col-sm-1 close">
                      <!-- Redirects to the update page of the post -->
                      <a href = "{{url("edit_post/$post->id") }}">
                        <button type="button" class="btn btn-primary glyphicon glyphicon-edit"></button>
                      </a>
                  </small>
                  <h4 class="card-title"><img src="http://i.imgur.com/OaZKMKP.gif" width="175px" height="150px">
                    {{$post->message}}
                  </h4>
                  <br>
                  
                  <!-- Redirects to the comment page of that post -->
                  <a href = "{{url("comment/$post->id") }}">
                      <button type="button" class="btn btn-info glyphicon glyphicon-comment">
                          <span class="badge"></span>
                      </button>
                  </a>
                  
                </div>
                <br>
            @endforeach
        </ul>
    @else
        <p id="noPosts">There are no posts to be displayed</p>
    @endif

</div>
@endsection

