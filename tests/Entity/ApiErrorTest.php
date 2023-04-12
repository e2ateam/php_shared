<?php

namespace E2ateam\Shared\Tests\Entity;

use PHPUnit\Framework\TestCase;
use E2ateam\Shared\Entity\ApiError;

class ApiErrorTest extends TestCase
{
    public function testCreateAnApiError(): void
    {        
        $actual = new ApiError(
            '{"errors": [{"context":"user","message":"name: The name field is required."}]}',
            'uri/mock',
        );
        $this->assertNotEmpty($actual);
        $this->assertNotEmpty($actual->getTimestamp());
        $messages = $actual->getMessage();
        $this->assertNotEmpty($messages);
        $this->assertEquals(1, count($messages));
        $this->assertEquals('user', $messages[0]['context']);
        $this->assertEquals(
            'name: The name field is required.',
            $messages[0]['message'],
        );
        $this->assertEquals('uri/mock', $actual->getUri());
    }

    public function testCreateAnApiErrorAndSerializeObject(): void
    {
        $error = new ApiError(
            '{"errors": [{"context":"user","message":"name: The name field is required."}]}',
            'uri/mock',
        );
        $actual = $error->serialize();
        $this->assertNotEmpty($actual);
        $this->assertEquals(3, count($actual));
        $this->assertNotEmpty($actual['timestamp']);
        $messages = $actual['message'];
        $this->assertNotEmpty($messages);
        $this->assertEquals(1, count($messages));
        $this->assertEquals('user', $messages[0]['context']);
        $this->assertEquals(
            'name: The name field is required.',
            $messages[0]['message'],
        );
        $this->assertEquals('uri/mock', $actual['uri']);
    }
}
