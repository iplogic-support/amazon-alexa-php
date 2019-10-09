<?php

namespace MaxBeckers\AmazonAlexa\Response\Directives\AmazonPay;

use MaxBeckers\AmazonAlexa\Response\Directives\Directive;

/**
 * @author Maximilian Beckers <beckers.maximilian@gmail.com>
 */
class SetupDirective extends Directive
{
    const TYPE = 'Connections.SendRequest';

    public $name;
    public $payload;
    public $token;

    /**
     * @return SetupDirective
     */
    public static function create($name, $payload, $token): self
    {
        $setupDirective = new self();

        $setupDirective->type = self::TYPE;
        $setupDirective->name = $name;
        $setupDirective->payload = $payload;
        $setupDirective->token = $token;

        return $setupDirective;
    }
}
