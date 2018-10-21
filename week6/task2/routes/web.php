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