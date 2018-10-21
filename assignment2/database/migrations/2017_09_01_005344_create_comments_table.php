<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // Create table comments
        Schema::create('comments', 
        function(Blueprint $table) { 
            $table->increments('id'); 
            $table->string('comment'); 
            $table->integer('post_id');
            $table->integer('user_id');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        // Drops comments table if it exists
        Schema::dropIfExists('comments');
    }
}
