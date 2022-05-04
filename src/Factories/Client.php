<?php

namespace tapha\MetaPack\Factories;

use GuzzleHttp\HandlerStack;
use GuzzleHttp\Client as HttpClient;
use \tapha\MetaPack\Contracts\Client as ClientInterface;
use Illuminate\Support\Arr;

/**
 * MetaPack API wrapper for Laravel
 *
 * @package  MetaPack
 * @author   @tapha
 */
class Client implements ClientInterface
{

    /**
     * @var HttpClient
     */
    protected $client;

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $apiSecret;

    /**
     * @var string
     */
    protected $carrierServices;


    /**
     * @param $baseURL
     * @param $apiKey
     * @param $apiSecret
     * @param $carrierServices
     */
    public function __construct($baseURL, $apiKey, $apiSecret, $carrierServices)
    {
        $stack = HandlerStack::create();

        $stack->push(new ErrorHandler);

        $this->client = new HttpClient([
            'handler' => $stack,
            'base_uri' => $baseURL,
            'allow_redirects' => [
                'strict' => true
            ]
        ]);

        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
        $this->carrierServices = $carrierServices;
    }

    /**
     * Prepare option data to be passed to the Guzzle request
     *
     * @param array $params
     * @param array $options
     * @return array
     */
    private function prepareData($params = null, $options = [])
    {
        if (Arr::get($options, 'content_type') == "json") {
            $data['json'] = $params; // pass data as array which gets json_encoded
        } else {
            $data['query'] = $this->prepareQueryString($params); // pass data as query string
        }

        return array_merge($data, $options);
    }

    /**
     * Prepare a query string from an array of params
     *
     * @param array $params
     * @return string
     */
    private function prepareQueryString(array $params = [])
    {
        return preg_replace('/%5B[0-9]+%5D/simU', '', http_build_query($params));
    }

    /**
     * @param $endPoint
     * @param array $params
     * @param array $options
     * @return mixed
     */
    public function rawGet($endPoint, array $options = [])
    {
        //$params += ['auth' => [$this->apiKey, $this->apiSecret]];
        $credentials = base64_encode($this->apiKey . ':' . $this->apiSecret);

        $options += [
            'headers' => [
                'Authorization' => 'Basic ' . $credentials,
            ],
        ];
        
        $response = $this->client->get($endPoint, $options);
        switch ($response->getHeader('content-type')) {
            case "application/json":
                return $response->json();
                break;
            default:
                return $response->getBody()->getContents();
        }
    }

    /**
     * @param $endPoint
     * @param array $params
     * @param array $options
     * @return mixed
     */
    public function get($endPoint, array $params = [], array $options = [])
    {
        //$params += ['auth' => [$this->apiKey, $this->apiSecret]];
        $credentials = base64_encode($this->apiKey . ':' . $this->apiSecret);

        $params += [
            'headers' => [
                'Authorization' => 'Basic ' . $credentials,
            ],
        ];
        
        $response = $this->client->get($endPoint, $this->prepareData($params, $options));
        switch ($response->getHeader('content-type')) {
            case "application/json":
                return $response->json();
                break;
            default:
                return $response->getBody()->getContents();
        }
    }

    /**
     * @param $endPoint
     * @param array $params
     * @param array $options
     * @return string
     * @throws \Exception
     */
    public function post($endPoint, array $params = null, array $options = [])
    {
        $options['headers']['Authorization'] = "Bearer $this->token";
        $response = $this->client->post($endPoint, $this->prepareData($params, $options));
        switch ($response->getHeader('content-type')) {
            case "application/json":
                return $response->json();
                break;
            default:
                return $response->getBody()->getContents();
        }
    }


    /**
     * @param $endPoint
     * @param array $params
     * @return string
     * @throws \Exception
     */
    public function put($endPoint, array $params = [], array $options = [])
    {
        $response = $this->client->put($endPoint, $this->prepareData($params, $options));
        switch ($response->getHeader('content-type')) {
            case "application/json":
                return $response->json();
                break;
            default:
                return $response->getBody()->getContents();
        }
    }

    /**
     * @param $endPoint
     * @param array $params
     * @param array $options
     * @return string
     * @throws \Exception
     */
    public function delete($endPoint, array $params = [], array $options = [])
    {
        $response = $this->client->delete($endPoint, $this->prepareData($params, $options));
        switch ($response->getHeader('content-type')) {
            case "application/json":
                return $response->json();
                break;
            default:
                return $response->getBody()->getContents();
        }
    }
}
