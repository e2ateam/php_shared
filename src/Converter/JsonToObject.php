<?php

namespace E2ateam\Shared\Converter;

use InvalidArgumentException;
use E2ateam\Shared\Constants\Constants;

class JsonToObject
{
    public static function convert(string $className, string $array): array|object
    {
        $array = json_decode($array, true);
        $data = @unserialize(sprintf(
            'O:%d:"%s"%s',
            strlen($className),
            $className,
            strstr(serialize($array), ':')
        ));

        if ($data === false) {
            throw new InvalidArgumentException(
                printf(Constants::INVALIDA_ARGUMENT, 'param array')
            );
        }

        if (JsonToObject::is_array($data)) {
            return JsonToObject::createAnObjectFromAnArray(
                $className,
                (array) $data,
            );
        }

        return JsonToObject::createAnObjectFromAnObject(
            $className,
            $array,
        );
    }

    public static function is_array(array|object $data)
    {
        return array_key_exists(0, (array) $data);
    }

    private static function createAnObjectFromAnArray(string $className, array $data): array
    {
        $result = [];
        foreach ($data as $values) {
            $obj = JsonToObject::createAnObjectFromAnObject($className, $values);
            array_push($result, $obj);
        }

        return $result;
    }

    private static function createAnObjectFromAnObject(string $className, array $data): object
    {
        $class = new \ReflectionClass($className);

        return $class->newInstanceArgs($data);
    }
}
