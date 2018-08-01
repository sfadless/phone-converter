<?php

namespace Sfadless\PhoneConverter\Tests;

use PHPUnit\Framework\TestCase;
use Sfadless\PhoneConverter\RusPhoneFormat;

/**
 * RusPhoneFormatTest
 *
 * @author PavelGolikov <pgolikov327@gmail.com>
 */
class RusPhoneFormatTest extends TestCase
{
    /**
     * @var RusPhoneFormat
     */
    private $format;

    public function setUp()
    {
        $this->format = new RusPhoneFormat();
    }

    public function testIsCorrect()
    {
        $phones = [
            '79123456789' => true,
            '+79000000000' => false,
            '89113456789' => false,
            '79000000000' => true,
            '79333' => false,
        ];

        foreach ($phones as $phone => $correct) {
            $this->assertEquals($this->format->isCorrect($phone), $correct, $phone);
        }
    }

    public function testConvert()
    {
        $phones = [
            '9012345678' => '79012345678',
            '89012345678' => '79012345678',
            '79012345678' => '79012345678',
            '+79012345678' => '79012345678',
            '+7 901 234 56 78' => '79012345678',
            '+7 (901) 234 - 56 - 78' => '79012345678',
        ];

        foreach ($phones as $phone => $converted) {
            $this->assertEquals(
                $this->format->convert($phone), $converted
            );
        }
    }
}