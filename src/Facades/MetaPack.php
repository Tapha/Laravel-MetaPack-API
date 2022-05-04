<?php

namespace tapha\MetaPack\Facades;

use Illuminate\Support\Facades\Facade;
use tapha\MetaPack\Contracts\Api\Consignment;
use tapha\MetaPack\Contracts\Api\Webhook;
use tapha\MetaPack\Contracts\Client;
use tapha\MetaPack\Factories\Entity\ConsignmentEntity;
/**
 * @method static void setClient(Client $client)
 * @method static Consignment consignment()
 */
class MetaPack extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'tapha\MetaPack\MetaPack';
    }
}
