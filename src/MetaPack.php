<?php

namespace tapha\MetaPack;

use tapha\MetaPack\Factories\Api\DisplaySettings;
use tapha\MetaPack\Factories\Api\Format;
use tapha\MetaPack\Factories\Api\Media;
use tapha\MetaPack\Factories\Api\Venue;
use tapha\MetaPack\Factories\Client;
use tapha\MetaPack\Factories\Api\Category;
use tapha\MetaPack\Factories\Api\Subcategory;
use tapha\MetaPack\Factories\Api\Webhook;
use tapha\MetaPack\Factories\Api\Event;
use tapha\MetaPack\Factories\Api\User;

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
     * @return Category
     */
    public function category()
    {
        return new Category($this->client);
    }

    /**
     * @return Subcategory
     */
    public function subcategory()
    {
        return new Subcategory($this->client);
    }

    /**
     * @return Webhook
     */
    public function webhook()
    {
        return new Webhook($this->client);
    }

    /**
     * @return Event
     */
    public function event()
    {
        return new Event($this->client);
    }

    /**
     * @return Venue
     */
    public function venue()
    {
        return new Venue($this->client);
    }

    /**
     * @return User
     */
    public function user()
    {
        return new User($this->client);
    }

    /**
     * @return Format
     */
    public function format()
    {
        return new Format($this->client);
    }

    /**
     * @return DisplaySettings
     */
    public function displaySettings()
    {
        return new displaySettings($this->client);
    }

    /**
     * @return Media
     */
    public function media()
    {
        return new Media($this->client);
    }
}
