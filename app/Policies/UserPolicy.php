<?php

namespace App\Policies;

use App\ActRules;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\ActRules  $actRules
     * @return mixed
     */
    public function view(User $user, ActRules $actRules)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return in_array($user->id,[1]);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\ActRules  $actRules
     * @return mixed
     */
    public function update(User $user, ActRules $actRules)
    {
        return in_array($user->id,[1]);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\ActRules  $actRules
     * @return mixed
     */
    public function delete(User $user, ActRules $actRules)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\ActRules  $actRules
     * @return mixed
     */
    public function restore(User $user, ActRules $actRules)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\ActRules  $actRules
     * @return mixed
     */
    public function forceDelete(User $user, ActRules $actRules)
    {
        //
    }
}
