<?php

namespace App\Policies;

use App\User;
use App\Policy;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class PolicyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the policy.
     *
     * @param  \App\User  $user
     * @param  \App\Policy  $policy
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPolicy('update-policy');
    }

    /**
     * Determine whether the user can create policies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPolicy('update-policy');
    }

    /**
     * Determine whether the user can update the policy.
     *
     * @param  \App\User  $user
     * @param  \App\Policy  $policy
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->hasPolicy('update-policy');
    }

    public function link(User $user)
	{
		return $user->hasPolicy('update-policy');
	}

    /**
     * Determine whether the user can delete the policy.
     *
     * @param  \App\User  $user
     * @param  \App\Policy  $policy
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->hasPolicy('delete-policy');
    }

    /**
     * Determine whether the user can restore the policy.
     *
     * @param  \App\User  $user
     * @param  \App\Policy  $policy
     * @return mixed
     */
    public function restore(User $user, Policy $policy)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the policy.
     *
     * @param  \App\User  $user
     * @param  \App\Policy  $policy
     * @return mixed
     */
    public function forceDelete(User $user, Policy $policy)
    {
        //
    }
}
