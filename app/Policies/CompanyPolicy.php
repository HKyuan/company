<?php

namespace App\Policies;

use App\Company;
use App\Member;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any companies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        // $member = Auth::guard('member')->user();

        // if (Auth::guard('member')->check()) {
        //     return $member->roles->find($member->id)->permissions->where('right', 'read')->first()->right === 'read';
        // }
        // return $member->roles->find($member->id)->permissions->where('right', 'read')->first()->right === 'read';
        // return $user->roles->find($user->id)->permissions->where('right', 'read')->first()->right === 'read';
    }

    /**
     * Determine whether the user can view the company.
     *
     * @param  \App\User  $user
     * @param  \App\Company  $company
     * @return mixed
     */
    public function view(Member $member, Company $company)
    {
        return $member->id == 1;
        // dd($member);
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