<?php

namespace App\Listeners;

use App\Events\GeneratePrize;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GeneratePrizeListener
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
     * @param  GeneratePrize  $event
     * @return void
     */
    public function handle(GeneratePrize $event)
    {
        switch ($event->type) {

        }
    }
}
