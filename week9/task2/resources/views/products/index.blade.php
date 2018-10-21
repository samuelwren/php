@extends('layouts.master')

@section('title')
    Product Index
@endsection

@section('content')
    
    <h1>Products</h1>
    
    <ul>
        
        @foreach ($products as $product)
            <a href="/product/{{ $product->id }}"> 
                <li> {{ $product->name }} </li> 
            </a>
        @endforeach
        
    </ul>

     <a href='/product/create'> Create </a>

@endsection