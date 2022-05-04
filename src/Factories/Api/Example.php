<?php

namespace YourName\Boilerplate\Factories\Api;

use YourName\Boilerplate\Factories\Entity\Example as ExampleEntity;
use YourName\Boilerplate\Contracts\Api\Example as ExampleInterface;
use YourName\Boilerplate\Factories\HelperEntity\ExampleHelperEntity;

/**
 * Boilerplate API wrapper for Laravel
 *
 * @package  Boilerplate
 * @author   @YourName
 */
class Example extends AbstractApi implements ExampleInterface
{
    /**
     * The class of the entity we are working with
     *
     * @var ExampleEntity
     */
    protected $class = ExampleEntity::class;

    /**
     * The Boilerplate API endpoint of the resource type.
     *
     * @var string
     */
    protected $endpoint = "Examples";

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function create(int $organizerId, array $Example)
    {
        $data['Example'] = $Example;
        $endpoint = "organizations/$organizerId/$this->endpoint";

        // Send "create" request
        $Example = $this->client->post($endpoint, $data, ['content_type' => 'json']);

        // Parse response
        $Example = json_decode($Example);

        return new ExampleEntity($Example);
    }

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function publish(int $exampleId)
    {
        // Prep the endpoint
        $endpoint = $this->getEndpoint() . '/' . $exampleId . '/publish';

        // Send "publish" request
        $response = $this->client->post($endpoint, null, ['content_type' => 'json']);

        // Parse response
        $response = json_decode($response, true);

        return isset($response['published']) ? $response['published'] : false;
    }

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function unpublish(int $exampleId)
    {
        // Prep the endpoint
        $endpoint = $this->getEndpoint() . '/' . $exampleId . '/unpublish';

        // Send "unpublish" request
        $response = $this->client->post($endpoint, null, ['content_type' => 'json']);

        // Parse response
        $response = json_decode($response, true);

        return isset($response['unpublished']) ? $response['unpublished'] : false;
    }

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function list(string $by, int $id, array $filterParams = [])
    {
        $objects = null;
        $pagination = null;

        // Prep the endpoint
        $endpoint = "$by/$id/$this->endpoint";

        $response = $this->client->get($endpoint, $filterParams);
        $response = json_decode($response);

        if (property_exists($response, "$this->endpoint")) {
            $objects = array_map(function ($object) {
                return $this->instantiateEntity($object);
            }, $response->{$this->endpoint});
        }

        if (property_exists($response, "$this->pagination")) {
            $pagination = new Pagination($response->{$this->pagination});
        }

        return new ObjectList($pagination, $objects);
    }

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function cancel(int $exampleId)
    {
        // Prep the endpoint
        $endpoint = $this->getEndpoint() . "/" . $exampleId . "/cancel";

        // Send "cancel" request
        $response = $this->client->post($endpoint, null, ['content_type' => 'json']);

        // Parse response
        $response = json_decode($response, true);

        return isset($response['canceled']) ? $response['canceled'] : false;
    }

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function copy(int $exampleId)
    {
        // Prep the endpoint
        $endpoint = $this->getEndpoint() . "/" . $exampleId . "/copy";

        // Send "copy" request
        $response = $this->client->post($endpoint, null, ['content_type' => 'json']);

        // Parse response
        $Example = json_decode($response);

        return new ExampleEntity($event);
    }
}
