@extends('layouts.master')

@section('title')
  item Detail
@endsection

@section('content')

    <h1>{{$item->summary}}</h1>
    {{$item->details}}
    
    <p><a href = "{{url("delete_item/$item->id") }}"> Delete Item</a></p>
    <p><a href = "{{url("update_item/$item->id") }}"> Update Item</a></p>
    <p><a href = "/"> Home</a></p>

@endsection
