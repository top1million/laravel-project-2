<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CarListner
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        error_log('Car created Car created lorem ipsum ***********************************************Car created lorem ipsum ***********************************************Car created lorem ipsum ***********************************************Car created lorem ipsum ***********************************************Car created lorem ipsum ***********************************************');
        echo 'Car created lorem ipsum ***********************************************Car created lorem ipsum ***********************************************Car created lorem ipsum ***********************************************Car created lorem ipsum ***********************************************Car created lorem ipsum ***********************************************Car created lorem ipsum ***********************************************Car created lorem ipsum ***********************************************Car created lorem ipsum ***********************************************Car created lorem ipsum ***********************************************Car created lorem ipsum ***********************************************Car created lorem ipsum ***********************************************Car created lorem ipsum ***********************************************';
        redirect('/');
    }
}
