@extends('layouts.master')

@section('title') 
    Social Media
@endsection

@section('content')

<div class="col-sm-8">

    <div class="card card-block">
        <input type="hidden" name="id" value="{{ $post->id }}">
        <h2><strong>{{ $post->title }}</strong></h2>
        <h2>{{ $post->user->firstName }} {{ $post->user->lastName }}</h2>
        <h4 class="card-title"><img src="{{ url( $post->user->image ) }}" width="175px" height="150px">
            {{ $post->message }}
        </h4>
        <br>
    </div>


    <div>
        @if($comments)
        <ul class="pagination">
            <!-- Displays each comment for the post -->
            @foreach($comments as $comment)
                <div class="col-sm-8 card card-block">
                  <input type="hidden" name="id" value="{{ $comment->id }}">
                  <small class="close">
                      <!-- Deletes the comment of that post -->
                        @if (Auth::guest())
                            
                        @else
                            <!-- Check if logged in user = to the posts user -->
                            @if (Auth::user()->id == $comment->user_id)
                                <form method="POST" action="/comment/{{ $comment->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger glyphicon glyphicon-trash"></button>
                                </form>
                            @endif
                        @endif
                  </small>
                  <h2>{{ $comment->user->firstName }}</h2>
                  <h4>{{$comment->comment}}</h4>
                
                  <br>
                </div>
            @endforeach
        </ul>
        <div class="right">
            {{ $comments->links() }}
        </div>
        @endif
    </div>


    <form method="post" action="/comment">
        {{csrf_field()}}
        @if (Auth::guest())
            <input type="hidden">
        @else
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        @endif
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <br>
        <div class="col-sm-5 input-group">
          <span class="input-group-addon" id="basic-addon1">Comment</span>
          <input type="text" class="form-control" name="comment" placeholder="comment">
        </div>
        <br>
        @if (Auth::guest())
            <button class="btn btn-success" disabled>Add Comment</button>
        @else
            <button class="btn btn-success">Add Comment</button>
        @endif
    </form>

    <br>
</div>

@endsection

