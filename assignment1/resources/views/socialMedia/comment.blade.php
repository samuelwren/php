@extends('layouts.master')

@section('title') 
    Social Media
@endsection

@section('content')

<div class="col-sm-8">

    <div class="card card-block">
        <input type="hidden" name="id" value="{{ $post->id }}">
        <h2><strong>{{ $post->title }}</strong></h2>
        <h2>{{ $post->userName }}</h2>
        <h4 class="card-title"><img src="http://i.imgur.com/OaZKMKP.gif" width="175px" height="150px">
            {{ $post->message }}
        </h4>
        <br>
    </div>


    <div>
        @if($comments)
        <ul>
            <!-- Displays each comment for the post -->
            @foreach($comments as $comment)
                <div class="col-sm-8 card card-block">
                  <input type="hidden" name="commentID" value="{{ $comment->commentID }}">
                  <small class="close">
                      <!-- Deletes the comment of that post -->
                      <a href = "{{url("delete_comment/$post->id/$comment->commentID") }}">
                          <button type="button" class="btn btn-danger glyphicon glyphicon-trash"></button>
                      </a>
                  </small>
                  <h2>{{$comment->comment_userName}}</h2>
                  <h4>{{$comment->comment}}</h4>
                
                  <br>
                </div>
            @endforeach
        </ul>
        @endif
    </div>


    <form method="post" action="{{secure_url("addComment_action") }}">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{ $post->id }}">
        <div class="col-sm-5 input-group">
          <span class="input-group-addon" id="basic-addon1">Username</span>
          <input type="text" class="form-control" name="comment_userName" placeholder="Username">
        </div>
        <br>
        <div class="col-sm-5 input-group">
          <span class="input-group-addon" id="basic-addon1">Comment</span>
          <input type="text" class="form-control" name="comment" placeholder="comment">
        </div>
        <br>
        <button class="btn btn-success">Add Comment</button>
    </form>

</div>

@endsection

