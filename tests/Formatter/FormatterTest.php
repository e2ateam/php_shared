<?php

namespace E2ateam\Shared\Tests\Formatter;

use DateTime;
use E2ateam\Shared\Formatter\Formatter;
use PHPUnit\Framework\TestCase;

class FormatterTest extends TestCase
{
    public function testConversionDateToStr(): void
    {
        $actual = Formatter::dateToStr(new DateTime('2023-02-10 10:05:59'));
        $expected = '2023-02-10';
        $this->assertEquals($expected, $actual);
    }

    public function testConversionDateTimeToStr(): void
    {
        $actual = Formatter::dateTimeToStr(new DateTime('2023-02-10 10:05:59'));
        $expected = '2023-02-10 10:05:59';
        $this->assertEquals($expected, $actual);
    }
}
