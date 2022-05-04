<?php

namespace tapha\MetaPack;

use tapha\MetaPack\Factories\Client;
use tapha\MetaPack\Factories\Api\Consignment;

/**
 * MetaPack API wrapper for Laravel
 *
 * @package  MetaPack
 * @author   @tapha
 */
class MetaPack
{
    public $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return Consignment
     */
    public function consignment()
    {
        return new Consignment($this->client);
    }
}
