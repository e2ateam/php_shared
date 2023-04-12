<?php

namespace E2ateam\Shared\Converter;

class JsonToObject
{
    public static function convert(string $className, string $array): array|object
    {
        $array = json_decode($array, true);

        return @unserialize(sprintf(
            'O:%d:"%s"%s',
            strlen($className),
            $className,
            strstr(serialize($array), ':')
        ));
    }
}
