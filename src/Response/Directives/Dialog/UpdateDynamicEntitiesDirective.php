<?php

namespace MaxBeckers\AmazonAlexa\Response\Directives\Dialog;

use MaxBeckers\AmazonAlexa\Intent\Intent;
use MaxBeckers\AmazonAlexa\Response\Directives\Directive;

/**
 * @author KUDO Takashi <takashi@iplogic.co.jp>
 */
class UpdateDynamicEntitiesDirective extends Directive
{
    const TYPE = 'Dialog.UpdateDynamicEntities';

    /**
     * @var string|null
     */
    public $updateBehavior;

    /**
     * @var Array|null
     */
    public $types = [];

    /**
     * @param string      $updateBehavior
     * @param Intent|null $intent
     *
     * @return ElicitSlotDirective
     */
    public static function create(string $updateBehavior, Array $types = null): self
    {
        $updateDynamicEntitiesDirective = new self();

        $updateDynamicEntitiesDirective->type           = self::TYPE;
        $updateDynamicEntitiesDirective->updateBehavior = $updateBehavior;
        $updateDynamicEntitiesDirective->types          = $types;

        return $updateDynamicEntitiesDirective;
    }
}
