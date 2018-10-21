@extends('layouts.master')

@section('title')
  items
@endsection

@section('content')
    
    <h1>Items</h1>
    
    @if($items)
        <ul>
            @foreach($items as $item)
                <li>
                    <a href="{{url("item_detail/$item->id") }}"> {{$item->summary}} </a>
                </li>
                <br>
            @endforeach
        </ul>
    @else
        <p>No Items found</p>
    @endif

@endsection
