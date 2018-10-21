<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Product;

Route::resource('product', 'ProductController');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
   
   $products = App\Manufacturer::find(1)->products;
   dd($products);
   
   //dd(Product::find(1)->manufacturer);
   
   /* 
    $products = Product::all();
    //dd($products);
    foreach($products as $product) {
        echo $product->name;
    }
    */
    
    //Search where the id = 1
    //$product = Product::find(1);
    //$product = Product::findOrFail(1);
    //dd($product);
 
    //Search products with conditions
    //$products = Product::WHERE('price', '>', 800)->get();
    //dd($products);
 
    //Count function
    //$count = Product::WHERE('price', '>', 800)->get();
    //dd($count);
    
 
 /*
   $product = new Product;
   $product-> name = 'iPod';
   $product-> price = 99.95;
   $product-> save(); // save to products table
   $id = $product->id; // Retirives the id of the newly created product object
   dd($id);
  
  
  $product = Product::create(array('name' => 'Playstation', 'price' => 555));
  dd($product);
  */
});
