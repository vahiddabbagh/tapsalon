<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(OstanSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(FieldSeeder::class);
        $this->call(FacilitySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ComplexSeeder::class);
        $this->call(PlaceTypeSeeder::class);
        $this->call(PlaceSeeder::class);
        $this->call(NotificationTypeSeeder::class);
        $this->call(NotificationSeeder::class);
        $this->call(LikeSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(PlaceFieldSeeder::class);
        $this->call(PlaceFacilitySeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(PermissionRoleSeeder::class);
        
        
        

    }
}
