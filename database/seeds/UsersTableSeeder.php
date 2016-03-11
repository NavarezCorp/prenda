<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File as File;

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
        $user_id = DB::table('users')->insertGetId([
            'name'=>'Philip Radin Navarez',
            'email'=>'greywolf792002@gmail.com',
            'password'=>'$2y$10$r914VrMdsrar86vGd0OcXe/IOQHtjwtxINCb3BC5c0nd2meSfe83m',
            'pawnshop_id'=>1,
            'branch'=>'Bajada 1',
            'province_id'=>28,
            'city_id'=>41,
            'telephone_no'=>'none',
            'mobile_no'=>'09494496175',
        ]);
        
        File::makeDirectory('public/images/' . $user_id, 0777, TRUE, TRUE);
    }
}
