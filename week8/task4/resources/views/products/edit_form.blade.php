@extends('layouts.master')

@section('title')
    Product edit
@endsection

@section('content')

    <h1>Edit</h1>
   <p>
        <form method="POST" action="/product/{{ $product->id }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <p><label>Name: </label> <input type="text" name="name" value="{{ $product->name }}"/></p>
            <p><label>Price: </label> <input type="text" name="price" value="{{ $product->price }}"/></p>
            
            <p><select name="manufacturer">
                @foreach ($manufacturers as $manufacturer)
                    @if ($manufacturer->id == $product->manufacturer_id)
                        <option value="{{ $manufacturer->id }}" selected="selected">{{ $manufacturer->name }}</option>
                    @else
                        <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                    @endif
                @endforeach
            </select></p>
            
            
            
            <input type="submit" value="Update" class="link"/>
        </form>
    </p>
    
    <br>
    <a href='/product'> Cancel </a>

@endsection