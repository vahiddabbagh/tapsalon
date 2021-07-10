<?php

namespace App\Policies;

use App\City;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CityPolicy
{
    use HandlesAuthorization;


    public function before($user, $ability)
{
    if ($user->is_admin()) {
        return true;
    }
}


    /**
     * Determine whether the user can view any cities.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the city.
     *
     * @param  \App\User  $user
     * @param  \App\City  $city
     * @return mixed
     */
    public function view(?User $user, City $city)
    {
        return true;
    }

    /**
     * Determine whether the user can create cities.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the city.
     *
     * @param  \App\User  $user
     * @param  \App\City  $city
     * @return mixed
     */
    public function update(User $user, City $city)
    {
        return $user->has_permission('update_city');
    }

    /**
     * Determine whether the user can delete the city.
     *
     * @param  \App\User  $user
     * @param  \App\City  $city
     * @return mixed
     */
    public function delete(User $user, City $city)
    {
        return $user->has_permission('delete_city');
    }


}
