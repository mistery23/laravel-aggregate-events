<?php

declare(strict_types=1);

namespace Mistery23\AggregateEvents;

use Illuminate\Contracts\Events\Dispatcher;

/**
 * Class EventDispatcher
 */
class EventDispatcher
{

    /**
     * @var Dispatcher
     */
    private $dispatcher;


    /**
     * EventDispatcher constructor.
     *
     * @param Dispatcher $dispatcher
     */
    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param array $events
     *
     * @return void
     */
    public function dispatchAll(array $events): void
    {
        foreach ($events as $event) {
            $this->dispatcher->dispatch($event);
        }
    }
}
