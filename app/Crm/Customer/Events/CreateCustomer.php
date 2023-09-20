<?php

namespace Crm\Customer\Events;

use Crm\Customer\Models\CustomerModel;
use Crm\Services\customerService;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateCustomer
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

    private CustomerModel $customerModel;



    public function __construct(CustomerModel $customerModel)
    {
        $this->setCustomerModel($customerModel);
    }

    /**
     * @return CustomerModel
     */
    public function getCustomerModel(): CustomerModel
    {
        return $this->customerModel;
    }

    /**
     * @param CustomerModel $customerModel
     */
    public function setCustomerModel(CustomerModel $customerModel): void
    {
        $this->customerModel = $customerModel;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
