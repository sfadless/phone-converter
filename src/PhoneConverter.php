<?php

namespace Sfadless\PhoneConverter;

use Sfadless\PhoneConverter\Exception\FailedConvertException;

/**
 * PhoneConverter
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class PhoneConverter
{
    /**
     * @var PhoneFormatInterface
     */
    private $phoneFormat;

    /**
     * @param $phoneString
     * @return string
     * @throws FailedConvertException
     */
    public function convert($phoneString)
    {
        $phone = $this->phoneFormat->convert($phoneString);

        if (false === $this->phoneFormat->isCorrect($phone)) {
            throw new FailedConvertException(sprintf("Failed convert phone ", $phoneString));
        }

        return $phone;
    }

    /**
     * PhoneConverter constructor.
     * @param PhoneFormatInterface $phoneFormat
     */
    public function __construct(PhoneFormatInterface $phoneFormat)
    {
        $this->phoneFormat = $phoneFormat;
    }
}