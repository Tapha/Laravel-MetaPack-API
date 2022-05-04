<?php

namespace YourName\Boilerplate\Factories\Api;

use YourName\Boilerplate\Factories\Entity\Webhook as WebhookEntity;
use YourName\Boilerplate\Contracts\Api\Webhook as WebhookInterface;

/**
 * Boilerplate API wrapper for Laravel
 *
 * @package  Boilerplate
 * @author   @YourName
 */
class Webhook extends AbstractApi implements WebhookInterface
{

    /**
     * The class of the entity we are working with
     *
     * @var WebhookEntity
     */
    protected $class = WebhookEntity::class;

    /**
     * The Boilerplate API endpoint of the resource type.
     *
     * @var string
     */
    protected $endpoint = "webhooks";

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function create(WebhookEntity $webhook)
    {
        // Data
        $data = $webhook->toArray();

        // Send "create" request
        $webhook = $this->client->post($this->getEndpoint(), $data, ['content_type' => 'json']);

        // Parse response
        $webhook = json_decode($webhook);

        // Create WebhookEntity from response
        return new WebhookEntity($webhook);
    }

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function delete($id)
    {
        /// Send delete request
        $webhook = $this->client->delete($this->getEndpoint()."/".$id);

        // Parse response
        $webhook = json_decode($webhook);

        // Create WebhookEntity from response
        return new WebhookEntity($webhook);
    }
}
