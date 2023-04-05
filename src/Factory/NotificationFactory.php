<?php

namespace E2ateam\Shared\Factory;

use E2ateam\Shared\Notification\Notification;
use E2ateam\Shared\Notification\NotificationErrorProps;

class NotificationFactory
{
    public static function create(
        string $context,
        string $message,
        ?Notification $notification = null
    ): Notification {
        if ($notification === null) {
            $notification = new Notification();
        }
        $notification->addError(new NotificationErrorProps(
            $context,
            $message,
        ));

        return $notification;
    }
}
