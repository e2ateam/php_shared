<?php

namespace E2ateam\Shared\Event;

interface EventHandlerInterface
{
    public function handle($event): void;
}
