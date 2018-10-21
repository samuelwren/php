@extends('layouts.master')

@section('title')
  Add Item
@endsection

@section('content')
    <h1>Add Item</h1>

    <form method="post" action="/add_item_action">
        {{csrf_field()}}
        <p>
            <label for="">Summary:</label>
            <input type="text" name="summary"/>
        </p>
        <p>
            <label for="">Details:</label>
            <input type="textarea" name="details"/>
        </p>
        <input type="submit" name="Add_Item"/>
    </form>

@endsection
