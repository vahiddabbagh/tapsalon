<?php

use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_roles')->insert([
            'role_id' => '1',
            'permission_id' => '1',
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
        ]);
        DB::table('permission_roles')->insert([
            'role_id' => '1',
            'permission_id' => '2',
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
        ]);
        DB::table('permission_roles')->insert([
            'role_id' => '1',
            'permission_id' => '3',
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
        ]);
        DB::table('permission_roles')->insert([
            'role_id' => '1',
            'permission_id' => '4',
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
        ]);

        DB::table('permission_roles')->insert([
            'role_id' => '2',
            'permission_id' => '1',
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
        ]);
        DB::table('permission_roles')->insert([
            'role_id' => '2',
            'permission_id' => '2',
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
        ]);
        DB::table('permission_roles')->insert([
            'role_id' => '2',
            'permission_id' => '3',
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
        ]);

        DB::table('permission_roles')->insert([
            'role_id' => '3',
            'permission_id' => '1',
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
        ]);
    }
}
