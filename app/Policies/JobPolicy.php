<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    public function viewAnyEmployer(User $user): bool
    {
        return true;
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Job $job): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->employer !== null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Job $job): bool|Response
    {
        if ($job->employer->user_id !== $user->id)
            return false;
        if ($job->jobApplications()->count() > 0)
            return Response::deny("Can't edit a job with applicants");

        return true;
        // return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Job $job): bool
    {
        return $job->employer->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Job $job): bool
    {
        return $job->employer->user_id === $user->id;
        ;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Job $job): bool
    {
        return $job->employer->user_id === $user->id;
        ;
    }

    public function apply(User $user, Job $job)
    {
        return !$job->hasUserApplied($user);

    }
}
// If you name the policy using laravel conventions you do not need to register the policy in
// authServiceProvider.php => laravel will automatically pick it up.

// policy is specific to a Model on which it is called not to a controller
// For example  $this->authorize('update', $post); 
// in the above example the policy is determined based on Post class (not the controller from where 
// the policy is called)