<?php

namespace YourName\Boilerplate\Contracts\Api;

use YourName\Boilerplate\Factories\Entity\Example as ExampleEntity;
use YourName\Boilerplate\Factories\HelperEntity\ExampleHelperEntity;

/**
 * The Example object represents an Boilerplate Example. An Example is owned by one Organization..
 *
 * @package  Boilerplate
 * @author   @YourName
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
