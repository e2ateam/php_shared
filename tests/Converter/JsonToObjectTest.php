<?php

namespace E2ateam\Shared\Tests\Converter;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use E2ateam\Shared\Constants\Constants;
use E2ateam\Shared\Converter\JsonToObject;
use E2ateam\Shared\Notification\NotificationErrorProps;

class JsonToObjectTest extends TestCase
{
    public function testConvertArrayJsonToObject(): void
    {
        $actual = JsonToObject::convert(
            NotificationErrorProps::class,
            '[{"context":"context 1","message":"message 1"}]',
        );
        $this->assertNotEmpty($actual);
        $this->assertEquals(1, count($actual));
        $this->assertEquals('context 1', $actual[0]->getContext());
        $this->assertEquals('message 1', $actual[0]->getMessage());

        $actual = JsonToObject::convert(
            NotificationErrorProps::class,
            '['.
            '  {"context":"context 1","message":"message 1"},'.
            '  {"context":"context 2","message":"message 2"}'.
            ']',
        );
        $this->assertNotEmpty($actual);
        $this->assertEquals(2, count($actual));
        $this->assertEquals('context 1', $actual[0]->getContext());
        $this->assertEquals('message 1', $actual[0]->getMessage());
        $this->assertEquals('context 2', $actual[1]->getContext());
        $this->assertEquals('message 2', $actual[1]->getMessage());
    }

    public function testConvertJsonToObject(): void
    {
        $actual = JsonToObject::convert(
            NotificationErrorProps::class,
            '{"context":"context 1","message":"message 1"}',
        );
        $this->assertNotEmpty($actual);
        $this->assertEquals('context 1', $actual->getContext());
        $this->assertEquals('message 1', $actual->getMessage());
    }

    public function testJsonToObjectWithoutMessage(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            printf(Constants::INVALIDA_ARGUMENT, 'param array')
        );
        JsonToObject::convert(
            NotificationErrorProps::class,
            '',
        );
    }
}
