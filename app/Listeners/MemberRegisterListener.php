<?php

namespace App\Listeners;

use App\Events\MemberRegisterEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MemberRegisterListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MemberRegisterEvent  $event
     * @return void
     */
    public function handle(MemberRegisterEvent $event)
    {
        //
    }
}
