<?php

namespace YourName\Boilerplate\Contracts\Api;

/**
 * An object representing a single webhook associated with the account.
 *
 * @package  Boilerplate
 * @author   @YourName
 */
interface Webhook
{
    
    /**
     * {@inheritdoc}
     */
    public function all();

    /**
     * {@inheritdoc}
     */
    public function get($id);

    /**
     * Send create request to API
     *
     * @param \YourName\Boilerplate\Factories\Entity\Webhook $webhook
     * @return \YourName\Boilerplate\Factories\Entity\Webhook
     */
    public function create(\YourName\Boilerplate\Factories\Entity\Webhook $webhook);

    /**
     * Delete a webhook
     *
     * @param $id
     * @return \YourName\Boilerplate\Factories\Entity\Webhook
     */
    public function delete($id);
}
