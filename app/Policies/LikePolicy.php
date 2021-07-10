<?php

namespace App\Policies;

use App\Like;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LikePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any likes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->is_admin();
    }

    /**
     * Determine whether the user can view the like.
     *
     * @param  \App\User  $user
     * @param  \App\Like  $like
     * @return mixed
     */
    public function view(User $user, Like $like)
    {
        return $user->has_permission('view_like');;
    }

    /**
     * Determine whether the user can create likes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true; 
    }

    /**
     * Determine whether the user can update the like.
     *
     * @param  \App\User  $user
     * @param  \App\Like  $like
     * @return mixed
     */
    public function update(User $user, Like $like)
    {
        return $user->has_permission('update_like') && $user->id === $like->user_id;
    }

    /**
     * Determine whether the user can delete the like.
     *
     * @param  \App\User  $user
     * @param  \App\Like  $like
     * @return mixed
     */
    public function delete(User $user, Like $like)
    {
        return $user->has_permission('delete_like');
    }


}
