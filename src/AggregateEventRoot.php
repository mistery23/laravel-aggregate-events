<?php

declare(strict_types=1);

namespace Mistery23\AggregateEvents;

/**
 * Interface AggregateEventRoot
 */
interface AggregateEventRoot
{


    /**
     * @return array
     */
    public function releaseEvents(): array;
}
