<?php

namespace tapha\MetaPack\Contracts\Api;

/**
 * An object representing a single webhook associated with the account.
 *
 * @package  MetaPack
 * @author   @tapha
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
     * @param \tapha\MetaPack\Factories\Entity\Webhook $webhook
     * @return \tapha\MetaPack\Factories\Entity\Webhook
     */
    public function create(\tapha\MetaPack\Factories\Entity\Webhook $webhook);

    /**
     * Delete a webhook
     *
     * @param $id
     * @return \tapha\MetaPack\Factories\Entity\Webhook
     */
    public function delete($id);
}
