<?php

use Illuminate\Database\Seeder;

class PlaceFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PlaceField::class, 100)->create();
    }
}
