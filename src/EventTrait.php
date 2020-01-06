<?php

declare(strict_types=1);

namespace Mistery23\AggregateEvents;

/**
 * Trait EventTrait
 */
trait EventTrait
{

    /**
     * @var array
     */
    private $events = [];


    /**
     * @return array
     */
    public function releaseEvents(): array
    {
        $events       = $this->events;
        $this->events = [];

        return $events;
    }

    /**
     * @param mixed $event
     *
     * @return void
     */
    protected function recordEvent($event): void
    {
        $this->events[] = $event;
    }
}
