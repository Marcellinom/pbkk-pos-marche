<?php

namespace App\Modules\Shared\Handler;

class EventHandler
{
    private static array $events = [];
    private static bool $on_hold = false;

    public static function hold(): void
    {
        self::$on_hold = true;
    }

    /**
     * Directly publish domain event.
     * @param mixed $event
     */
    public static function publish($event): void
    {
        if (self::$on_hold) {
            self::$events[] = $event;
        } else {
            event($event);
        }
    }

    public static function release(): void
    {
        self::$on_hold = false;

        $consumeEvents = self::$events;
        self::$events = [];

        while (!empty($consumeEvents)) {
            $event = array_shift($consumeEvents);
            event($event);
        }
    }

    public static function reset(): void
    {
        self::$events = [];
    }
}
