<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'read_place',
            'description' => 'create a place',
        ]);
        DB::table('permissions')->insert([
            'name' => 'create_place',
            'description' => 'create a place',
        ]);
        DB::table('permissions')->insert([
            'name' => 'edit_place',
            'description' => 'edit a place',
        ]);
        DB::table('permissions')->insert([
            'name' => 'delete_place',
            'description' => 'delete a place',
        ]);
    }
}
