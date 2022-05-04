<?php

namespace YourName\Boilerplate\Facades;

use Illuminate\Support\Facades\Facade;
use YourName\Boilerplate\Contracts\Api\Webhook;
use YourName\Boilerplate\Contracts\Client;
use YourName\Boilerplate\Factories\Entity\Event;

/**
 * @method static void setClient(Client $client)
 */
class Boilerplate extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'YourName\Boilerplate\Boilerplate';
    }
}
