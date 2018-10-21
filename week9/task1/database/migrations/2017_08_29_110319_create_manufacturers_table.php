<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufacturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table manufacturer
        Schema::create('manufacturers', 
        function(Blueprint $table) { 
            $table->increments('id'); 
            $table->string('name'); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drops manufacturer table if it exists
        Schema::dropIfExists('manufacturers');
    }
}
