<?php

namespace tapha\MetaPack\Factories\Api;

use tapha\MetaPack\Factories\Entity\ConsignmentEntity as ConsignmentEntity;
use tapha\MetaPack\Contracts\Api\Consignment as ConsignmentInterface;

/**
 * MetaPack API wrapper for Laravel
 *
 * @package  MetaPack
 * @author   @tapha
 */
class Consignment extends AbstractApi implements ConsignmentInterface
{
    /**
     * The class of the entity we are working with
     *
     * @var ConsignmentEntity
     */
    protected $class = ConsignmentEntity::class;

    /**
     * The MetaPack API endpoint of the resource type.
     *
     * @var string
     */
    protected $endpoint = "shipping/v1/consignments";

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function find(array $filterParams = [])
    {
        $data['orderReference'] = '';

        // Send "get" request
        $consignment = $this->client->get($this->endpoint, $data);
        return $consignment;
    }

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function create()
    {
        $data = array(
            "consignment" => array(
              "orders" => array(
                array(
                  "orderRef" => "string",
                  "orderDate" => "2019-08-24T14:15:22Z",
                  "value" => array(
                    "amount" => 0,
                    "currencyCode" => "string"
                  ),
                  "shippingCharge" => array(
                    "amount" => 0,
                    "currencyCode" => "string"
                  ),
                  "insuranceCharge" => array(
                    "amount" => 0,
                    "currencyCode" => "string"
                  ),
                  "otherCharge" => array(
                    "amount" => 0,
                    "currencyCode" => "string"
                  )
                )
              ),
              "measurementUnits" => array(
                "weight" => "kg",
                "measurement" => "cm",
                "volume" => "ml"
              ),
              "shipmentRef" => "string",
              "parcels" => array(
                array(
                  "shipperRef" => "ref-123456",
                  "packagingType" => "string",
                  "weight" => array(
                    "value" => 0
                  ),
                  "dimensions" => array(
                    "height" => 0,
                    "width" => 0,
                    "depth" => 0,
                    "diameter" => 0
                  ),
                  "value" => array(
                    "amount" => 0,
                    "currencyCode" => "string"
                  ),
                  "items" => array(
                    array(
                      "itemRef" => "string",
                      "harmonisedCode" => "string",
                      "countryOfOrigin" => "string",
                      "fabricContent" => "string",
                      "description" => "string",
                      "itemType" => "string",
                      "quantity" => 0,
                      "value" => array(
                        "amount" => 0
                      ),
                      "weight" => array(
                        "value" => 0
                      ),
                      "dangerousGoods" => array(
                        "unId" => "string",
                        "shippingName" => "string",
                        "productClass" => "1.2",
                        "packagingGroup" => "string",
                        "measurementUnit" => "string",
                        "packagingInstructions" => "string",
                        "quantity" => 0,
                        "packageType" => "string",
                        "amount" => 0,
                        "regulationAuthority" => "string",
                        "regulationLevelCode" => "string",
                        "transportationMeans" => "string",
                        "reportableQuantity" => true,
                        "radioActive" => true,
                        "subRiskClass" => "string",
                        "technicalName" => "string",
                        "additionalInfo" => "string",
                        "overPack" => "string",
                        "packagingInstructionSection" => "string"
                      ),
                      "exportReferenceNumber" => "string",
                      "exportLicenseNumber" => "string",
                      "batteryChemCode" => "string"
                    )
                  )
                )
              ),
              "attributes" => array(
                "cashOnDelivery" => array(
                  "value" => array(
                    "amount" => 0,
                    "currencyCode" => "string"
                  ),
                  "paymentMethod" => "string"
                ),
                "contentType" => "string",
                "notificationType" => "sms",
                "flexibleDelivery" => array(
                  "deliveryInstructions" => "string",
                  "what3words" => "string"
                ),
                "incoterms" => "string"
              ),
              "type" => "delivery",
              "manifestGroupCode" => "string",
              "tags" => array(
                "string"
              ),
              "sender" => array(
                "addressLine1" => "string",
                "addressLine2" => "string",
                "postCode" => "string",
                "countryCode" => "string",
                "companyName" => "string",
                "city" => "string",
                "stateProvince" => "string",
                "timeZone" => "string",
                "type" => "residential",
                "addressReference" => "string",
                "code" => "string",
                "contact" => array(
                  "name" => "string",
                  "timeZone" => "string",
                  "language" => "string",
                  "email" => "string",
                  "phone" => "string"
                ),
                "taxAndDuty" => array(
                  "EORINumber" => "string",
                  "IOSSNumber" => "string",
                  "VATNumber" => "string"
                )
              ),
              "recipient" => array(
                "addressLine1" => "string",
                "addressLine2" => "string",
                "postCode" => "string",
                "countryCode" => "string",
                "companyName" => "string",
                "city" => "string",
                "stateProvince" => "string",
                "timeZone" => "string",
                "type" => "residential",
                "addressReference" => "string",
                "code" => "string",
                "contact" => array(
                  "name" => "string",
                  "timeZone" => "string",
                  "language" => "string",
                  "email" => "string",
                  "phone" => "string"
                ),
                "taxAndDuty" => array(
                  "EORINumber" => "string",
                  "IOSSNumber" => "string",
                  "VATNumber" => "string"
                )
              ),
              "supportingAgents" => array(
                "property1" => array(
                  "addressLine1" => "string",
                  "addressLine2" => "string",
                  "postCode" => "string",
                  "countryCode" => "string",
                  "companyName" => "string",
                  "city" => "string",
                  "stateProvince" => "string",
                  "timeZone" => "string",
                  "type" => "residential",
                  "addressReference" => "string",
                  "code" => "string",
                  "contact" => array(
                    "name" => "string",
                    "timeZone" => "string",
                    "language" => "string",
                    "email" => "string",
                    "phone" => "string"
                  ),
                  "taxAndDuty" => array(
                    "EORINumber" => "string",
                    "IOSSNumber" => "string",
                    "VATNumber" => "string"
                  )
                ),
                "property2" => array(
                  "addressLine1" => "string",
                  "addressLine2" => "string",
                  "postCode" => "string",
                  "countryCode" => "string",
                  "companyName" => "string",
                  "city" => "string",
                  "stateProvince" => "string",
                  "timeZone" => "string",
                  "type" => "residential",
                  "addressReference" => "string",
                  "code" => "string",
                  "contact" => array(
                    "name" => "string",
                    "timeZone" => "string",
                    "language" => "string",
                    "email" => "string",
                    "phone" => "string"
                  ),
                  "taxAndDuty" => array(
                    "EORINumber" => "string",
                    "IOSSNumber" => "string",
                    "VATNumber" => "string"
                  )
                )
              )
            ),
            "shippingRules" => array(
              "collectionSlots" => array(
                "acceptable" => array(
                  array(
                    "from" => "2019-08-24T14:15:22Z",
                    "to" => "2019-08-24T14:15:22Z"
                  )
                ),
                "unacceptable" => array(
                  array(
                    "from" => "2019-08-24T14:15:22Z",
                    "to" => "2019-08-24T14:15:22Z"
                  )
                )
              ),
              "deliverySlots" => array(
                "acceptable" => array(
                  array(
                    "from" => "2019-08-24T14:15:22Z",
                    "to" => "2019-08-24T14:15:22Z"
                  )
                ),
                "unacceptable" => array(
                  array(
                    "from" => "2019-08-24T14:15:22Z",
                    "to" => "2019-08-24T14:15:22Z"
                  )
                )
              ),
              "collectionDays" => array(
                "monday" => true,
                "tuesday" => true,
                "wednesday" => true,
                "thursday" => true,
                "friday" => true,
                "saturday" => true,
                "sunday" => true
              ),
              "deliveryDays" => array(
                "monday" => true,
                "tuesday" => true,
                "wednesday" => true,
                "thursday" => true,
                "friday" => true,
                "saturday" => true,
                "sunday" => true
              ),
              "carrierServices" => array(
                "string"
              ),
              "code" => "string"
            )
          );

        // Send "create" request
        $Consignment = $this->client->post($this->endpoint, $data, ['content_type' => 'json']);

        // Parse response
        $Consignment = json_decode($Consignment);

        return new ConsignmentEntity($Consignment);
    }
}
