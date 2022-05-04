<?php

namespace YourName\Boilerplate;

use YourName\Boilerplate\Factories\Api\DisplaySettings;
use YourName\Boilerplate\Factories\Api\Format;
use YourName\Boilerplate\Factories\Api\Media;
use YourName\Boilerplate\Factories\Api\Venue;
use YourName\Boilerplate\Factories\Client;
use YourName\Boilerplate\Factories\Api\Category;
use YourName\Boilerplate\Factories\Api\Subcategory;
use YourName\Boilerplate\Factories\Api\Webhook;
use YourName\Boilerplate\Factories\Api\Event;
use YourName\Boilerplate\Factories\Api\User;

/**
 * Boilerplate API wrapper for Laravel
 *
 * @package  Boilerplate
 * @author   @YourName
 */
class Boilerplate
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
