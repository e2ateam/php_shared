<?php

namespace E2ateam\Shared\Exception;

use E2ateam\Shared\Converter\ArrayToJson;
use E2ateam\Shared\Enum\HttpStatus;

/**
 * @codeCoverageIgnore
 */
class NotificationException extends HttpException
{
    public function __construct(array $errors, HttpStatus $statusCode)
    {
        $json = ArrayToJson::convert($errors);
        parent::__construct($json, $statusCode);
    }
}
