<?php

use Illuminate\Database\Seeder;

class TimingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Date 2020-03-01 ////////////////////////////////////
        DB::table('timings')->insert([
            'place_id' => 10,
            'gender' => 1,
            'date_start' => date_create('2020-03-01 08:30:00'), 
            'date_end' => date_create('2020-03-01 12:30:00'), 
            'discount' => 20,
            'reservable' => true,
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
        ]);

        DB::table('timings')->insert([
            'place_id' => 10,
            'gender' => 2,
            'date_start' => date_create('2020-03-01 14:00:00'), 
            'date_end' => date_create('2020-03-01 20:30:00'), 
            'discount' => 20,
            'reservable' => true,
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
        ]);

        // Date 2020-03-02 /////////////////////////////////////
        DB::table('timings')->insert([
            'place_id' => 10,
            'gender' => 1,
            'date_start' => date_create('2020-03-02 08:30:00'), 
            'date_end' => date_create('2020-03-02 10:00:00'), 
            'reservable' => false,
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
        ]);


        DB::table('timings')->insert([
            'place_id' => 10,
            'gender' => 2,
            'date_start' => date_create('2020-03-02 12:30:00'), 
            'date_end' => date_create('2020-03-02 20:30:00'), 
            'reservable' => true,
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
        ]);

        // Date 2020-03-03 ////////////////////////////////////////
        DB::table('timings')->insert([
            'place_id' => 10,
            'gender' => 2,
            'date_start' => date_create('2020-03-03 08:30:00'), 
            'date_end' => date_create('2020-03-03 14:30:00'), 
            'reservable' => true,
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
        ]);


        DB::table('timings')->insert([
            'place_id' => 10,
            'gender' => 1,
            'date_start' => date_create('2020-03-03 16:30:00'), 
            'date_end' => date_create('2020-03-03 22:30:00'), 
            'discount' => 40,
            'reservable' => true,
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
        ]);

        // Date 2020-03-04 ////////////////////////////////////
        DB::table('timings')->insert([
            'place_id' => 10,
            'gender' => 2,
            'date_start' => date_create('2020-03-04 08:30:00'), 
            'date_end' => date_create('2020-03-04 20:30:00'), 
            'discount' => 0,
            'reservable' => true,
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
            
        ]);


    }
}
