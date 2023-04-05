<?php

namespace E2ateam\Shared\Entity;

use Carbon\Carbon;
use E2ateam\Shared\Converter\JsonToObject;
use E2ateam\Shared\Notification\NotificationErrorProps;

class ApiError
{
    private Carbon $timestamp;

    private array $message;

    private string $uri;

    public function __construct(string $message, string $uri)
    {
        $this->timestamp = Carbon::now();
        $this->message = JsonToObject::convert(
            NotificationErrorProps::class,
            $message
        );
        $this->uri = $uri;
    }

    public function serialize()
    {
        return get_object_vars($this);
    }

    /**
     * Get the value of timestamp
     */
    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    /**
     * Get the value of message
     */
    public function getMessage(): array
    {
        return $this->message;
    }

    /**
     * Get the value of uri
     */
    public function getUri(): string
    {
        return $this->uri;
    }
}
