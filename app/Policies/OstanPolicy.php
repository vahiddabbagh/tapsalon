<?php

namespace App\Policies;

use App\Ostan;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OstanPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->is_admin()) {
            return true;
        }
    }

    
    /**
     * Determine whether the user can view any ostans.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the ostan.
     *
     * @param  \App\User  $user
     * @param  \App\Ostan  $ostan
     * @return mixed
     */
    public function view(?User $user, Ostan $ostan)
    {
        return true;
    }

    /**
     * Determine whether the user can create ostans.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the ostan.
     *
     * @param  \App\User  $user
     * @param  \App\Ostan  $ostan
     * @return mixed
     */
    public function update(User $user, Ostan $ostan)
    {
        return $user->has_permission('update_ostan');
    }

    /**
     * Determine whether the user can delete the ostan.
     *
     * @param  \App\User  $user
     * @param  \App\Ostan  $ostan
     * @return mixed
     */
    public function delete(User $user, Ostan $ostan)
    {
        return $user->has_permission('delete_ostan');
    }



}
