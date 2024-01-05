<?php

namespace App\Policies;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EmployerPolicy
{

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Employer $employer): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->employer === null; // checks if user is already an employer
        // will return false if user is not authenticated because of route model binding
        // 
    }


    public function update(User $user, Employer $employer): bool
    {
        return $employer->user_id === $user->id;
    }

    public function delete(User $user, Employer $employer): bool
    {
        return false;
    }

    public function restore(User $user, Employer $employer): bool
    {
        return false;
    }

    public function forceDelete(User $user, Employer $employer): bool
    {
        return false;
    }
}
