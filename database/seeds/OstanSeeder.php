<?php

use Illuminate\Database\Seeder;

class OstanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Ostan::class, 20)->create()->each(function($ostan){
            $ostan->cities()->createMany(factory(App\City::class,2)->make()->toArray());
        });
    }
}
