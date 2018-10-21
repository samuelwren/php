@extends('layouts.master')

@section('title') 
    Social Media
@endsection

@section('content')

    <div class="col-md-6">
        
        @foreach($users as $user)
            <div class="card card-block">
                <h3>
                    <img src="{{ url( $user->image ) }}" class="img-rounded" width="125px" height="125px">
                            <a href="user/{{$user->id}}" > 
                                {{ $user->firstName }} {{ $user->lastName }} 
                            </a>
                    </img>
                </h3>
            </div>
        @endforeach
        
    </div>

@endsection

