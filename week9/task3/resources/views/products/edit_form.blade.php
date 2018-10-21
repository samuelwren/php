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
            
            <p>
                <label>Name: </label> 
                <input type="text" name="name" value="{{ old('name') != null ? old('name') : $product->name}}"/>
            
                @if (count($errors) > 0)
                        <label class="alert">
                            <?= $errors->first('name'); ?>
                        </label>
                @endif
            </p>
                
            <p>
                <label>Price: </label> 

                @if (count($errors) > 0)
                    <input type="text" name="price" value="{{ old('price') }}"/>
                        <label class="alert">
                            <?= $errors->first('price'); ?>
                        </label>
                @else
                    <input type="text" name="price" value="{{ $product->price }}"/>
                @endif
            </p>
            
            <p>
                <select name="manufacturer"> 
                    @foreach ($manufacturers as $manufacturer)
                        @if ($manufacturer->id == $product->manufacturer_id)
                            <option value="{{ old('id') != null ? old('id') : $manufacturer->id}}" selected="selected">
                                {{ $manufacturer->name }}
                            </option>
                        @else
                            <option value="{{ $manufacturer->id }}">
                                {{ $manufacturer->name }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </p>
            
            
            
            <input type="submit" value="Update" class="link"/>
        </form>
    </p>
    
    <br>
    <a href='/product'> Cancel </a>

@endsection