<?php

namespace MaxBeckers\AmazonAlexa\Request\Request\System;

use MaxBeckers\AmazonAlexa\Request\Request\AbstractRequest;

/**
 * @author Charlie Root <charlie@chrl.ru>
 */
class ConnectionsResponseRequest extends SystemRequest
{
    const TYPE        = 'Connections.Response';
    const NAME_UPSELL = 'Upsell';
    const NAME_BUY    = 'Buy';
    const NAME_CANCEL = 'CANCEL';
    const NAME_SETUP  = 'Setup';
    const NAME_CHARGE = 'Charge';

    /**
     * @var string|null
     */
    public $name;

    /**
     * @var string|null
     */
    public $token;

    /**
     * @var Status|null
     */
    public $status;

    /**
     * @var Status|null
     */
    public $payload;

    /**
     * {@inheritdoc}
     */
    public static function fromAmazonRequest(array $amazonRequest): AbstractRequest
    {
        $request = new self();

        $request->type    = self::TYPE;
        $request->name    = isset($amazonRequest['name']) ? $amazonRequest['name'] : null;
        $request->token   = isset($amazonRequest['token']) ? $amazonRequest['token'] : null;
        $request->status  = isset($amazonRequest['status']) ? Status::fromAmazonRequest($amazonRequest['status']) : null;
        $request->payload = isset($amazonRequest['payload']) ? Payload::fromAmazonRequest($amazonRequest['payload']) : null;

        $request->setRequestData($amazonRequest);

        return $request;
    }
}
