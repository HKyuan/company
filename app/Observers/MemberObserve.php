<?php

namespace App\Observers;

use App\Member;

class MemberObserve
{
    /**
     * Handle the member "created" event.
     *
     * @param  \App\Member  $member
     * @return void
     */
    public function created(Member $member)
    {
        //
    }

    /**
     * Handle the member "updated" event.
     *
     * @param  \App\Member  $member
     * @return void
     */
    public function updated(Member $member)
    {
        //
    }

    /**
     * Handle the member "deleted" event.
     *
     * @param  \App\Member  $member
     * @return void
     */
    public function deleted(Member $member)
    {
        //
    }

    /**
     * Handle the member "restored" event.
     *
     * @param  \App\Member  $member
     * @return void
     */
    public function restored(Member $member)
    {
        //
    }

    /**
     * Handle the member "force deleted" event.
     *
     * @param  \App\Member  $member
     * @return void
     */
    public function forceDeleted(Member $member)
    {
        //
    }
}
