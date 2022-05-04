<?php

namespace tapha\MetaPack\Contracts\Api;

use tapha\MetaPack\Factories\Entity\Consignment as ConsignmentEntity;
use tapha\MetaPack\Factories\HelperEntity\ConsignmentHelperEntity;

/**
 * The Consignment object represents a MetaPack Consignment. An Consignment is owned by one Organization..
 *
 * @package  MetaPack
 * @author   @tapha
 */
interface Consignment
{
    /**
     * Find Consignments by Parameters
     *
     * @param array $filterParams
     * @return ConsignmentHelperEntity
     */
    public function find(array $filterParams = []);

    /**
     * Send create request to API
     *
     * @return ConsignmentEntity
     */
    public function create();
}
