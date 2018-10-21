@extends('layouts.master')

@section('title') 
    Social Media
@endsection

@section('content')
    <div class="col-sm-4" >
        <!-- Displays each post in the database -->
        <div class="card card-block">
            <div class="close">
                <form method="POST" action="/friend">
                    {{csrf_field()}}
                        @if (Auth::guest())
                            <input type="hidden">
                        @elseif (Auth::user()->id == $user->id)
                            <input type="hidden">
                        @else
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="friend_id" value="{{ $user->id }}">
                            <button class="btn btn-success">Add</button>
                        @endif
                </form>
            </div>
            <h2><strong>{{ $user->firstName}} {{ $user->lastName}}</strong></h2>
            <!-- Checks to see if user is logged in -->
            @if (Auth::guest())
                @else
                    <!-- Checks to see if logged in user equals the profile of the user -->
                    @if (Auth::user()->id == $user->id)
                        <small class="col-sm-1 close">
                        <!-- Redirects to the update page of the post -->
                        <a href = "/user/{{ $user->id }}/edit">
                            <button type="button" class="btn btn-primary glyphicon glyphicon-edit"></button>
                        </a>
                    </small>
                    @endif
            @endif
            <h2><img src="{{ url($user->image) }}" width="175px" height="150px"></img></h2>
            <h3> {{ $user->firstName }} is {{ $age }} years old</h3>
        </div>
        <br>
        <br>
        <br>
        
        <div>
            <p><strong>{{ $user->firstName}} {{ $user->lastName}}</strong> is friends with: </p>
            
            @foreach($friends as $friend)
                <!-- Checks to see if the friend user_id = logged in user -->
                @if ($friend->user_id == $user->id)
                    <div class="card card-block">
                        <h3>
                            <img src="{{ url( $friend->image ) }}" class="img-rounded" width="85px" height="85px">
                                <a href="{{$friend->friend_id}}" >
                                    {{ $friend->firstName }} {{ $friend->lastName }} 
                                </a>
                            </img>
                        </h3>
                    </div>
                @else
                    <div class="card card-block">
                        <h3>
                            <img src="{{ url( $friend->image ) }}" class="img-rounded" width="85px" height="85px">
                                <a href="{{$friend->user_id}}" >
                                    {{ $friend->firstName }} {{ $friend->lastName }} 
                                </a>
                            </img>
                        </h3>
                    </div>
                @endif
            @endforeach
        </div>
    
    </div>
    <div class="col-sm-1"></div>
    
    <div class="col-sm-4">
        @foreach($posts as $post)
            <div class="card card-block">
                <input type="hidden" name="id" value="{{ $post->id }}">
                <h2><strong>{{$post->title}}</strong></h2>
                <a href="/user/{{$post->id}}" > <h2>{{ $post->firstName }} {{ $post->lastName }}</h2> </a>
                    <h4 class="card-title"><img src="{{ url( $post->image ) }}" width="175px" height="150px">
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
    </div>
@endsection

