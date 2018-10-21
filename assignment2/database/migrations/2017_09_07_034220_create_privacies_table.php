<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // Create table privacies
        Schema::create('privacies', 
        function(Blueprint $table) { 
            $table->increments('id'); 
            $table->string('privacySetting');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        // Drops privacies table if it exists
        Schema::dropIfExists('privacies');
    }
}
