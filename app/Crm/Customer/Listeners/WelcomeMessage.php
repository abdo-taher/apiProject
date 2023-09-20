<?php

namespace Crm\Customer\Listeners;

use Crm\Customer\Events\CreateCustomer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WelcomeMessage
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
    public function handle(CreateCustomer $event): void
    {
       $customer = $event->getCustomerModel();
    }
}
