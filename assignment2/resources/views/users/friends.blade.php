@extends('layouts.master')

@section('title') 
    Social Media
@endsection

@section('content')

        <div class="col-md-6">
            <!-- Checks to see if user is logged in -->
            @if (Auth::check())
                <!-- Sees if perso has any friends -->
                @if($count == 0)
                    You have no friends shit bag
                @else
                    @foreach($friends as $friend)
                    <p><strong>You are Friends with</strong></p>
                        <div class="card card-block">
                            <small class="col-sm-3 close">
                                <!-- Deletes the Post -->
                                <form method="POST" action="/friend/{{ $friend->id}}">
                                    {{ csrf_field(Auth::user()->id) }}
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <button type="submit" class="btn btn-danger glyphicon glyphicon-trash"></button>
                                </form>
                            </small>
                            <h3>
                                <img src="{{ url( $friend->image ) }}" class="img-rounded" width="85px" height="85px">
                                        <a href="{{$friend->friend_id}}" > 
                                            {{ $friend->firstName }} {{ $friend->lastName }} 
                                        </a>
                                </img>
                            </h3>
                        </div>
                    @endforeach
                @endif
            
            @else
                <p>You are not signed in</p>
            @endif
            
        </div>

@endsection

