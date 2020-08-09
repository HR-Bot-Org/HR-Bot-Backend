<?php

namespace App\Policies;

use App\Job;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
{
    use HandlesAuthorization;

    /**
     * Check wether the current user can apply on the given job
     * @param  App\User   $user 
     * @param  App\Job    $job  
     * @return boolean
     */
    public function apply(User $user, Job $job): bool
    {
        if($user->isApplicant() && $job->isAcceptingInteviews() &&  is_null($job->getInterviewFor($user))) {
            return True;
        }

        return False;
    }

    /**
     * Check wether the current user can update the given job
     * 
     * @param  App\User   $user 
     * @param  App\Job    $job  
     * @return boolean
     */
    public function update(User $user, Job $job): bool
    {
        return $user->isRecruiter() && $job->isCreatedBy($user);
    }

    /**
     * Check wether the current user can destroy the given job
     * 
     * @param  App\User   $user 
     * @param  App\Job    $job  
     * @return boolean
     */
    public function destroy(User $user, Job $job): bool
    {
        return $user->isRecruiter() && $job->isCreatedBy($user);
    }
}
