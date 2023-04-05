<?php

namespace E2ateam\Shared\Event;

interface EventDispatcherInterface
{
    public function notify(Event $event): void;

    public function register(string $eventName, EventHandlerInterface $eventHandler): void;

    public function unregister(string $eventName, EventHandlerInterface $eventHandler): void;

    public function unregisterAll(): void;
}
