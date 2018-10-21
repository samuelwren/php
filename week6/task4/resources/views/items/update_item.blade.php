@extends('layouts.master')

@section('title')
  Update Item
@endsection

@section('content')
    <h1>Update</h1>
    
    <form method="post" action="/update_item_action"> 
        {{csrf_field()}} 
        <input type="hidden" name="id" value="{{ $item->id }}"> 
        <p> 
            <label>Summary: </label> 
            <input type="text" name="summary" value="{{$item->summary }}"> 
        </p>
        <p>
            <label>Details:</label>
            <textarea type="text" name="details">{{ $item->details }}</textarea>
        </p> 
        <input type="submit" name="Update Item" value="Update Item"> 
    </form>
    
@endsection
