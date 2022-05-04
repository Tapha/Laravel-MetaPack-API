<?php

namespace YourName\Boilerplate\Contracts;

/**
 * Boilerplate API wrapper for Laravel
 *
 * @package  Boilerplate
 * @author   @YourName
 */
interface Client
{

    /**
     * @param $endPoint
     * @param array $params
     * @return mixed
     */
    public function get($endPoint, array $params = []);

    /**
     * @param $endPoint
     * @param array $params
     * @return mixed
     */
    public function post($endPoint, array $params = []);
}
