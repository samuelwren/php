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

Route::get('/', function () {
    $sql = "SELECT * FROM item";
    $items = DB::SELECT($sql);
    return view('items.item_list')->with('items', $items);
});

Route::get('item_detail/{id}', function ($id) {
    $item = get_item($id);
    return view('items/item_detail')->with('item', $item);
});

Route::get('add_item', function () {
    return view('items.add_item');
});

Route::post('add_item_action', function () {
    $summary = request('summary');
    $details = request('details');
    
    $id =  add_item($summary, $details);
    
    if ($id) {
        return redirect("item_detail/$id");
    } else {
        die('Error!');
    }
    
});

function add_item($summary, $details) {
    $sql = "insert into item (summary, details) values (?, ?)";
    DB::insert($sql, array($summary, $details));
    $id = DB::getPdo()->lastInsertId();
    
    return ($id);
    
}


function get_item($id) {
    $sql = "SELECT * FROM item 
                WHERE id = ?";
    $items = DB::SELECT($sql, array($id));
    
    if (count($items) != 1) {
        die("You suck! fix it! $sql");
    }
    
    $item = $items[0];
    return $item;
}