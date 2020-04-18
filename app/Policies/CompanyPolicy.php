<?php

namespace App\Policies;

use App\Company;
use App\Member;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class CompanyPolicy
{
    use HandlesAuthorization;

    protected $member;

    //using multiple guard app only using default guard
    public function __construct()
    {
        $this->member = Auth::guard('member');
    }

    /**
     * Determine whether the user can view any companies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
        // return $this->member->check();
    }

    /**
     * Determine whether the user can view the company.
     *
     * @param  \App\User  $user
     * @param  \App\Company  $company
     * @return mixed
     */
    public function view(User $user, Company $company)
    {
        return true;
        // return $this->member->check();
    }

    /**
     * Determine whether the user can create companies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the company.
     *
     * @param  \App\User  $user
     * @param  \App\Company  $company
     * @return mixed
     */
    public function update(User $user, Company $company)
    {
        //
    }

    /**
     * Determine whether the user can delete the company.
     *
     * @param  \App\User  $user
     * @param  \App\Company  $company
     * @return mixed
     */
    public function delete(User $user, Company $company)
    {
        //
    }

    /**
     * Determine whether the user can restore the company.
     *
     * @param  \App\User  $user
     * @param  \App\Company  $company
     * @return mixed
     */
    public function restore(User $user, Company $company)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the company.
     *
     * @param  \App\User  $user
     * @param  \App\Company  $company
     * @return mixed
     */
    public function forceDelete(User $user, Company $company)
    {
        //
    }
}