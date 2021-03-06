<?php

namespace App\Http\Controllers;

use App\Product;
use App\Manufacturer;

use Illuminate\Http\Request;

class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct() {
        $this->middleware('auth', [
            'except' => 'index'
        ]);
    }
    
    public function index() {
        $products = Product::all();
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('products.create_form')->with('manufacturers', Manufacturer::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // Form Validation
        $this->validate($request, [ 
            'name' => 'required|max:255', 
            'price' => 'required|numeric|min:0', 
            'manufacturer' =>'exists:manufacturers,id' 
        ]);
        
        // Store and Save Form
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->manufacturer_id = $request->manufacturer;
        $product->save();
        return redirect("/product/$product->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
        $product = Product::find($id);
        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
        $product = Product::find($id);
        return view('products.edit_form')->with('product', $product)->with('manufacturers', Manufacturer::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        // Form Validation
        $this->validate($request, [ 
            'name' => 'required|max:255', 
            'price' => 'required|numeric|min:0',
            'manufacturer' =>'exists:manufacturers,id' 
        ]);

        //
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->manufacturer_id = $request->manufacturer;
        $product->save();
        return redirect("/product/$product->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
        $product = Product::find($id);
        $product->delete();
        return redirect("/product");
    }
}
