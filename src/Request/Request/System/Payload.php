<?php

namespace MaxBeckers\AmazonAlexa\Request\Request\System;

/**
 * @author Maximilian Beckers <beckers.maximilian@gmail.com>
 */
class Payload
{
    const RESULT_ACCEPTED          = 'ACCEPTED';
    const RESULT_DECLINED          = 'DECLINED';
    const RESULT_ALREADY_PURCHASED = 'ALREADY_PURCHASED';
    const RESULT_ERROR             = 'ERROR';

    /**
     * @var string|null
     */
    public $purchaseResult;

    /**
     * @var string|null
     */
    public $productId;

    /**
     * @var string|null
     */
    public $message;

    // XXX TODO: AmazonPay対応。クラスを分けるべき。
    public $billingAgreementDetails;
    public $amazonOrderReferenceId;
    public $authorizationDetails;

    /**
     * @param array $amazonRequest
     *
     * @return Payload
     */
    public static function fromAmazonRequest(array $amazonRequest): self
    {
        $payload = new self();

        // FYI: https://developer.amazon.com/ja/docs/in-skill-purchase/add-isps-to-a-skill.html#handle-results
        $payload->purchaseResult = isset($amazonRequest['purchaseResult']) ? $amazonRequest['purchaseResult'] : null;
        $payload->productId      = isset($amazonRequest['productId']) ? $amazonRequest['productId'] : null;
        $payload->message        = isset($amazonRequest['message']) ? $amazonRequest['message'] : null;

        // XXX Setup
        $payload->billingAgreementDetails = isset($amazonRequest['billingAgreementDetails']) ? $amazonRequest['billingAgreementDetails'] : null;
        // XXX Charge
        $payload->amazonOrderReferenceId = isset($amazonRequest['amazonOrderReferenceId']) ? $amazonRequest['amazonOrderReferenceId'] : null;
        $payload->authorizationDetails = isset($amazonRequest['authorizationDetails']) ? $amazonRequest['authorizationDetails'] : null;

        return $payload;
    }
}
