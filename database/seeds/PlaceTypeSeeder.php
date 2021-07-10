<?php

use Illuminate\Database\Seeder;

class PlaceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('place_types')->insert([
            'name' => 'سالن',
        ]);
        DB::table('place_types')->insert([
            'name' => 'باشگاه',
        ]);
        DB::table('place_types')->insert([
            'name' => 'مجموعه تفریحی ورزشی',
        ]);
        
    }
}
