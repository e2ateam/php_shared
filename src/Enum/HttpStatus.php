<?php

namespace E2ateam\Shared\Enum;

/**
 * @codeCoverageIgnore
 */
enum HttpStatus: int
{
    case HTTP_CONTINUE = 100;
    case HTTP_SWITCHING_PROTOCOLS = 101;
    case HTTP_PROCESSING = 102;            // RFC2518
    case HTTP_OK = 200;
    case HTTP_CREATED = 201;
    case HTTP_ACCEPTED = 202;
    case HTTP_NON_AUTHORITATIVE_INFORMATION = 203;
    case HTTP_NO_CONTENT = 204;
    case HTTP_RESET_CONTENT = 205;
    case HTTP_PARTIAL_CONTENT = 206;
    case HTTP_MULTI_STATUS = 207;          // RFC4918
    case HTTP_ALREADY_REPORTED = 208;      // RFC5842
    case HTTP_IM_USED = 226;               // RFC3229
    case HTTP_MULTIPLE_CHOICES = 300;
    case HTTP_MOVED_PERMANENTLY = 301;
    case HTTP_FOUND = 302;
    case HTTP_SEE_OTHER = 303;
    case HTTP_NOT_MODIFIED = 304;
    case HTTP_USE_PROXY = 305;
    case HTTP_RESERVED = 306;
    case HTTP_TEMPORARY_REDIRECT = 307;
    case HTTP_PERMANENTLY_REDIRECT = 308;  // RFC7238
    case HTTP_BAD_REQUEST = 400;
    case HTTP_UNAUTHORIZED = 401;
    case HTTP_PAYMENT_REQUIRED = 402;
    case HTTP_FORBIDDEN = 403;
    case HTTP_NOT_FOUND = 404;
    case HTTP_METHOD_NOT_ALLOWED = 405;
    case HTTP_NOT_ACCEPTABLE = 406;
    case HTTP_PROXY_AUTHENTICATION_REQUIRED = 407;
    case HTTP_REQUEST_TIMEOUT = 408;
    case HTTP_CONFLICT = 409;
    case HTTP_GONE = 410;
    case HTTP_LENGTH_REQUIRED = 411;
    case HTTP_PRECONDITION_FAILED = 412;
    case HTTP_REQUEST_ENTITY_TOO_LARGE = 413;
    case HTTP_REQUEST_URI_TOO_LONG = 414;
    case HTTP_UNSUPPORTED_MEDIA_TYPE = 415;
    case HTTP_REQUESTED_RANGE_NOT_SATISFIABLE = 416;
    case HTTP_EXPECTATION_FAILED = 417;
    case HTTP_I_AM_A_TEAPOT = 418;                                               // RFC2324
    case HTTP_MISDIRECTED_REQUEST = 421;                                         // RFC7540
    case HTTP_UNPROCESSABLE_ENTITY = 422;                                        // RFC4918
    case HTTP_LOCKED = 423;                                                      // RFC4918
    case HTTP_FAILED_DEPENDENCY = 424;                                           // RFC4918
    case HTTP_RESERVED_FOR_WEBDAV_ADVANCED_COLLECTIONS_EXPIRED_PROPOSAL = 425;   // RFC2817
    case HTTP_UPGRADE_REQUIRED = 426;                                            // RFC2817
    case HTTP_PRECONDITION_REQUIRED = 428;                                       // RFC6585
    case HTTP_TOO_MANY_REQUESTS = 429;                                           // RFC6585
    case HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE = 431;                             // RFC6585
    case HTTP_UNAVAILABLE_FOR_LEGAL_REASONS = 451;
    case HTTP_INTERNAL_SERVER_ERROR = 500;
    case HTTP_NOT_IMPLEMENTED = 501;
    case HTTP_BAD_GATEWAY = 502;
    case HTTP_SERVICE_UNAVAILABLE = 503;
    case HTTP_GATEWAY_TIMEOUT = 504;
    case HTTP_VERSION_NOT_SUPPORTED = 505;
    case HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL = 506;                        // RFC2295
    case HTTP_INSUFFICIENT_STORAGE = 507;                                        // RFC4918
    case HTTP_LOOP_DETECTED = 508;                                               // RFC5842
    case HTTP_NOT_EXTENDED = 510;                                                // RFC2774
    case HTTP_NETWORK_AUTHENTICATION_REQUIRED = 511;                             // RFC6585

    /**
     * @codeCoverageIgnore
     */
    public function getMessages(): array
    {
        return [
            100 => 'Continue',
            101 => 'Switching Protocols',
            102 => 'Processing',            // RFC2518
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            207 => 'Multi-Status',          // RFC4918
            208 => 'Already Reported',      // RFC5842
            226 => 'IM Used',               // RFC3229
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            307 => 'Temporary Redirect',
            308 => 'Permanent Redirect',    // RFC7238
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Payload Too Large',
            414 => 'URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Range Not Satisfiable',
            417 => 'Expectation Failed',
            418 => 'I\'m a teapot',                                               // RFC2324
            421 => 'Misdirected Request',                                         // RFC7540
            422 => 'Unprocessable Entity',                                        // RFC4918
            423 => 'Locked',                                                      // RFC4918
            424 => 'Failed Dependency',                                           // RFC4918
            425 => 'Reserved for WebDAV advanced collections expired proposal',   // RFC2817
            426 => 'Upgrade Required',                                            // RFC2817
            428 => 'Precondition Required',                                       // RFC6585
            429 => 'Too Many Requests',                                           // RFC6585
            431 => 'Request Header Fields Too Large',                             // RFC6585
            451 => 'Unavailable For Legal Reasons',                               // RFC7725
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported',
            506 => 'Variant Also Negotiates',                                     // RFC2295
            507 => 'Insufficient Storage',                                        // RFC4918
            508 => 'Loop Detected',                                               // RFC5842
            510 => 'Not Extended',                                                // RFC2774
            511 => 'Network Authentication Required',                             // RFC6585
        ];
    }
}
