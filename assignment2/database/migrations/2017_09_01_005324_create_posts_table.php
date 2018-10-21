<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // Create table posts
        Schema::create('posts', 
        function(Blueprint $table) { 
            $table->increments('id'); 
            $table->string('title'); 
            $table->string('message'); 
            $table->integer('user_id');
            $table->integer('privacy_id'); 
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        // Drops posts table if it exists
        Schema::dropIfExists('posts');
    }
}
