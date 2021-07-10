<?php

namespace App\Policies;

use App\Region;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegionPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->is_admin()) {
            return true;
        }
    }

    
    /**
     * Determine whether the user can view any regions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the region.
     *
     * @param  \App\User  $user
     * @param  \App\Region  $region
     * @return mixed
     */
    public function view(?User $user, Region $region)
    {
        return true;
    }

    /**
     * Determine whether the user can create regions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the region.
     *
     * @param  \App\User  $user
     * @param  \App\Region  $region
     * @return mixed
     */
    public function update(User $user, Region $region)
    {
        return $user->has_permission('update_region');
    }

    /**
     * Determine whether the user can delete the region.
     *
     * @param  \App\User  $user
     * @param  \App\Region  $region
     * @return mixed
     */
    public function delete(User $user, Region $region)
    {
        return $user->has_permission('delete_region');
    }

}
