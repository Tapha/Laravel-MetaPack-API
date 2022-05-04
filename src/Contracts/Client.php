<?php

namespace tapha\MetaPack\Contracts;

/**
 * MetaPack API wrapper for Laravel
 *
 * @package  MetaPack
 * @author   @tapha
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
