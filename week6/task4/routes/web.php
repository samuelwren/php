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

Route::get('update_item/{id}', function ($id) {
    $item = get_item($id);
    return view('items/update_item')->with('item', $item);
});

Route::post('update_item_action', function () {
    $id = request('id');
    $summary = request('summary');
    $details = request('details');
    
    update_item($id, $summary, $details);
    
    if ($id) {
        return redirect("item_detail/$id");
    } else {
        die('Error!');
    }
});

Route::get('delete_item/{id}', function ($id) {
    delete_item($id);
    return redirect("/");
});

function delete_item($id) {
    $sql = "delete from item where id = ?";
    DB::delete($sql, array($id));
}


function update_item($id, $summary, $details) {
    $sql = "update item set summary = ?, details = ? where id = ?";
    DB::update($sql, array($summary, $details, $id));
}

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