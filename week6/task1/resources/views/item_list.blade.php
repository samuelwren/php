@extends('layouts.master')

@section('title')
  items
@endsection

@section('content')

    @foreach($items as $item)
        {{$item->summary}} : {{$item->details}}
        <br>
    @endforeach

@endsection
