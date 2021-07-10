<?php

use Illuminate\Database\Seeder;

class PlaceFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PlaceFacility::class, 100)->create();
    }
}
