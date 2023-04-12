<?php

namespace E2ateam\Shared\Tests\Converter;

use E2ateam\Shared\Converter\JsonToObject;
use E2ateam\Shared\Notification\Notification;
use E2ateam\Shared\Notification\NotificationErrorProps;
use PHPUnit\Framework\TestCase;

class JsonToObjectTest extends TestCase
{
    public function testConvertArrayJsonToObject(): void
    {
        $actual = JsonToObject::convert(
            Notification::class,
            '{"errors": [{"context":"context 1","message":"message 1"}]}',
        );
        $this->assertNotEmpty($actual);
        $this->assertEquals(1, count($actual->getErrors()));
        $this->assertEquals('context 1', $actual->getErrors()[0]['context']);
        $this->assertEquals('message 1', $actual->getErrors()[0]['message']);

        $actual = JsonToObject::convert(
            Notification::class,
            '{"errors": ['.
            '  {"context":"context 1","message":"message 1"},'.
            '  {"context":"context 2","message":"message 2"}'.
            ']}',
        );
        $this->assertNotEmpty($actual);
        $this->assertEquals(2, count($actual->getErrors()));
        $this->assertEquals('context 1', $actual->getErrors()[0]['context']);
        $this->assertEquals('message 1', $actual->getErrors()[0]['message']);
        $this->assertEquals('context 2', $actual->getErrors()[1]['context']);
        $this->assertEquals('message 2', $actual->getErrors()[1]['message']);
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
}
