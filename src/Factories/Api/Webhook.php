<?php

namespace tapha\MetaPack\Factories\Api;

use tapha\MetaPack\Factories\Entity\Webhook as WebhookEntity;
use tapha\MetaPack\Contracts\Api\Webhook as WebhookInterface;

/**
 * MetaPack API wrapper for Laravel
 *
 * @package  MetaPack
 * @author   @tapha
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
     * The MetaPack API endpoint of the resource type.
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
