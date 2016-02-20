<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user_id = DB::table('categories')->insertGetId([
            'name'=>'Rings',
            'description'=>'Rings category',
        ]);
    }
}
