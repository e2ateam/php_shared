<?php

namespace E2ateam\Shared\Exception;

use Illuminate\Http\Request;
use E2ateam\Shared\Entity\ApiError;
use E2ateam\Shared\Enum\HttpStatus;

/**
 * @codeCoverageIgnore
 */
class HttpException extends HttpStatusCodeException
{
    public function __construct(string $message, HttpStatus $statusCode)
    {
        parent::__construct($message, $statusCode->value);
    }

    public function render(Request $request)
    {
        $err = new ApiError(
            $this->getMessage(),
            $request->getUri(),
        );

        return response()->json($err->serialize(), $this->getCode());
    }
}
