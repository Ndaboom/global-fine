<?php

namespace App\Policies;

use App\Models\Event\Organizer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrganizerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(?User $user)
    {
        return Organizer::count();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Event\Organizer  $organizer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(?User $user, Organizer $organizer)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Event\Organizer  $organizer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Organizer $organizer)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Event\Organizer  $organizer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Organizer $organizer)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Event\Organizer  $organizer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Organizer $organizer)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Event\Organizer  $organizer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Organizer $organizer)
    {
        //
    }
}
