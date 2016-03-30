<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('auctions', function(Blueprint $table){
            $table->increments('id');
            $table->integer('users_id');
            $table->string('schedule');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('auctions');
    }
}
