<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user_id = DB::table('types')->insertGetId([
            'name'=>'Wedding ring',
            'description'=>'Wedding ring type',
        ]);
    }
}
