@extends('layouts.master')

@section('title') 
    Social Media
@endsection

@section('content')
<div class="col-sm-8" >

    @foreach ($posts as $post)

    <div class="card card-block">
      <h2><strong>{{{ $post ['user'] }}}</strong></h2>
      <small class="col-sm-4 close"> {{{ $post ['timeDate'] }}}  </small>
      <h4 class="card-title"><img src="{{{ $post ['image'] }}}" width="175px" height="150px">
        {{{ $post ['message'] }}}
      </h4>
      <br>
    </div>
    <br>
    
    @endforeach
</div>
@endsection

