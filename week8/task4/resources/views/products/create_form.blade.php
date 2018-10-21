@extends('layouts.master')

@section('title')
    Product Create Form
@endsection

@section('content')

    <h1>Create a New Product</h1>
    
    <form method="POST" action="/product">
        {{ csrf_field() }}
        <p><label>Name: </label> <input type="text" name="name"/></p>
        <p><label>Price: </label> <input type="text" name="price"/></p>
        <p><select name="manufacturer">
            @foreach ($manufacturers as $manufacturer)
                <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
            @endforeach
        </select></p>
        <input type="submit" value="Create"/>
    </form>
    
    <br>
    <button><a href='/product'> Cancel </a></button>

@endsection