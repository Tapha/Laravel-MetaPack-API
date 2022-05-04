<?php

namespace tapha\MetaPack\Contracts\Api;

use tapha\MetaPack\Factories\Entity\Example as ExampleEntity;
use tapha\MetaPack\Factories\HelperEntity\ExampleHelperEntity;

/**
 * The Example object represents an MetaPack Example. An Example is owned by one Organization..
 *
 * @package  MetaPack
 * @author   @tapha
 */
interface Example
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
     * @param int $organizer_id
     * @param array $example
     * @return ExampleEntity
     */
    public function create(int $organizer_id, array $example);

    /**
     * Send update request to API
     *
     * @param int $id
     * @param array $example
     * @return ExampleEntity
     */
    public function update(int $id, array $example);

    /**
     * Delete an Example
     *
     * @param $id
     * @return boolean
     */
    public function delete(int $id);

    /**
     * Publish an Example
     *
     * @param int $id
     * @return boolean
     */
    public function publish(int $id);

    /**
     * Unpublish an Example
     *
     * @param int $id
     * @return boolean
     */
    public function unpublish(int $id);

    /**
     * List of Examples by ID
     *
     * @param string $by id'
     * @param int $id
     * @param array $filterParams
     * @return ExampleHelperEntity
     */
    public function list(string $by, int $id, array $filterParams = []);

    /**
     * Copy an Example
     *
     * @param $id
     * @return ExampleEntity
     */
    public function copy(int $id);

    /**
     * Cancel an Example
     *
     * @param $id
     * @return boolean
     */
    public function cancel(int $id);
}
