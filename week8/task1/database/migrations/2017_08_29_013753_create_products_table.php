<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        
        // Create table products
        Schema::create('products', 
        function(Blueprint $table) { 
            $table->increments('id'); 
            $table->string('name'); 
            $table->float('price'); 
            $table->integer('manufacturer_id');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     
    public function down() {
        // Drops product table if it exists
        Schema::dropIfExists('products');

    }
}
