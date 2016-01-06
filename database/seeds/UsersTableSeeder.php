<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(['name'=>'Philip Radin Navarez', 'email'=>'greywolf792002@gmail.com', 'password'=>'$2y$10$r914VrMdsrar86vGd0OcXe/IOQHtjwtxINCb3BC5c0nd2meSfe83m']);
    }
}
