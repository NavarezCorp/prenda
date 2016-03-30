<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('items', function(Blueprint $table){
            $table->increments('id');
            $table->integer('users_id');
            $table->integer('auction_schedule_id');
            $table->integer('ticket_no');
            $table->integer('category_id');
            $table->integer('type_id');
            $table->string('price');
            $table->string('description');
            $table->string('images_id');
            $table->smallInteger('is_sold')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('items');
    }
}
