<?php

namespace Sfadless\PhoneConverter\Tests;

use PHPUnit\Framework\TestCase;
use Sfadless\PhoneConverter\Exception\FailedConvertException;
use Sfadless\PhoneConverter\PhoneConverter;
use Sfadless\PhoneConverter\RusPhoneFormat;

/**
 * PhoneConverterTest
 *
 * @author PavelGolikov <pgolikov327@gmail.com>
 */
class PhoneConverterTest extends TestCase
{
    /**
     * @var PhoneConverter
     */
    private $converter;

    public function setUp()
    {
        $format = new RusPhoneFormat();

        $this->converter = new PhoneConverter($format);
    }

    /**
     * @throws FailedConvertException
     */
    public function testConvert()
    {
        $this->assertEquals(
            $this->converter->convert('+7 (910) 123 45 67'),
            '79101234567'
        );
    }

    /**
     * @throws FailedConvertException
     */
    public function testExceptionOnWringLength()
    {
        $this->expectException(FailedConvertException::class);

        $this->converter->convert('8903333');
    }

    /**
     * @throws FailedConvertException
     */
    public function testExceptionOnWrongPhone()
    {
        $this->expectException(FailedConvertException::class);

        $this->converter->convert('qweaasdffff567');
    }
}