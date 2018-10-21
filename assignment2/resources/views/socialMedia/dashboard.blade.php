@extends('layouts.master')

@section('title') 
    Social Media
@endsection

@section('content')

<div class="col-sm-3">
       
    <form method="post" action="/post">
        {{csrf_field()}}
        <fieldset>
            @if (Auth::guest())
                <input type="hidden">
            @else
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            @endif
            <legend><span>Title</span></legend>
            <label>
                @if (count($errors->get('title')) > 0)
                    <input type="text" class="form-control" name="title" placeholder="<?= $errors->first('title'); ?>" size="40"/>
                @else
                    <input type="text" class="form-control" name="title" placeholder="Insert a Title Here!" size="40"/>
                @endif
            </label>
        </fieldset>
        <fieldset>
            <legend><span>Message</span></legend>
            <label>
                @if (count($errors->get('message')) > 0)
                    <input type="text" class="form-control" name="message" placeholder="<?= $errors->first('message'); ?>" size="40"/>
                @else
                    <input type="text" class="form-control" name="message" placeholder="Insert Message Here!" size="40"/>
                @endif
            </label>
        </fieldset>
        <fieldset>
            <legend><span>Privacy</span></legend>
            <select class="btn btn-secondary dropdown-toggle" name="privacy"> 
                @foreach($privacys as $privacy) 
                    @if($privacy->id === old('$privacy'))
                        <option value="{{ $privacy->id }}" selected="selected">{{ $privacy->privacySetting }}</option> 
                    @else 
                        <option value="{{ $privacy->id }}">{{ $privacy->privacySetting }}</option> 
                    @endif 
                @endforeach
            </select>
        </fieldset>
        <br>
        @if (Auth::guest())
            <button class="btn btn-primary" disabled>Post</button>
        @else
            <button class="btn btn-primary">Post</button>
        @endif
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
                  <a href="/user/{{$post->user->id}}" > <h2>{{ $post->user->firstName }} {{ $post->user->lastName }}</h2> </a>
                  <!-- Check if user is logged in -->
                  @if (Auth::guest())
                  
                  @else
                      <!-- Check if logged in user = to the posts user -->
                      @if (Auth::user()->id == $post->user_id)
                          <small class="col-sm-3 close">
                              <!-- Deletes the Post -->
                              <form method="POST" action="/post/{{ $post->id }}">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                  <button type="submit" class="btn btn-danger glyphicon glyphicon-trash"></button>
                              </form>
                          </small>
                          <small class="col-sm-1 close">
                              <!-- Redirects to the update page of the post -->
                              <a href = "/post/{{ $post->id }}/edit">
                                <button type="button" class="btn btn-primary glyphicon glyphicon-edit"></button>
                              </a>
                          </small>
                      @endif
                  @endif
                  <h4 class="card-title"><img src="{{ url($post->user->image) }}" width="175px" height="150px">
                    {{$post->message}}
                  </h4>
                  <br>
                  
                  <!-- Redirects to the comment page of that post -->
                  @if (App\Post::find($post->id)->getCommentCount() == 0)
                      <a href = "/post/{{ $post->id }}">
                          <button type="button" class="btn btn-primary glyphicon glyphicon-comment">
                              <span class="badge"></span>
                          </button>
                      </a>
                  @else
                      <a href = "/post/{{ $post->id }}">
                          <button type="button" class="btn btn-primary">
                              <span class="badge">{{ App\Post::find($post->id)->getCommentCount() }}</span>
                          </button>
                      </a>
                  @endif
                  
                </div>
                <br>
            @endforeach
        </ul>
    @else
        <p id="noPosts">There are no posts to be displayed</p>
    @endif

</div>
@endsection

