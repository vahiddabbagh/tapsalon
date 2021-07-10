<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        // 'App\Place' => 'App\Policies\PlacePolicy',
        // 'App\City' => 'App\Policies\CityPolicy',
        'App\Ostan' => 'App\Policies\OstanPolicy',
        'App\Notification' => 'App\Policies\NotificationPolicy',
        'App\comment' => 'App\Policies\commentPolicy',
        'App\Region' => 'App\Policies\RegionPolicy',
        'App\Like' => 'App\Policies\LikePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
    }
}
