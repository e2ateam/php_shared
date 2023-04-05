<?php

namespace E2ateam\Shared\Exception;

use E2ateam\Shared\Converter\ArrayToJson;
use E2ateam\Shared\Enum\HttpStatus;

/**
 * @codeCoverageIgnore
 */
class AuthorizationException extends HttpException
{
    public function __construct(array $errors)
    {
        $json = ArrayToJson::convert($errors);
        parent::__construct($json, HttpStatus::HTTP_FORBIDDEN);
    }
}
