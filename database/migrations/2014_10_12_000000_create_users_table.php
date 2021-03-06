<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            //$table->string('username')->unique();
            $table->string('password');
            $table->integer('pawnshop_id');
            $table->string('branch');
            $table->integer('province_id');
            $table->integer('city_id');
            $table->string('complete_address');
            $table->string('telephone_no');
            $table->string('mobile_no');
            $table->smallInteger('is_active')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
