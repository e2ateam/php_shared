<?php

namespace E2ateam\Shared\Tests\Converter;

use E2ateam\Shared\Converter\ArrayToJson;
use E2ateam\Shared\Factory\NotificationFactory;
use PHPUnit\Framework\TestCase;

class ArrayToJsonTest extends TestCase
{
    public function testConvertArrayToJson(): void
    {
        $actual = ArrayToJson::convert(NotificationFactory::create(
            'context',
            'message'
        )->getErrors());
        $expected = '[{"context":"context","message":"message"}]';

        $this->assertEquals($expected, $actual);
    }
}
