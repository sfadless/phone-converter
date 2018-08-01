<?php

namespace Sfadless\PhoneConverter;

/**
 * RusPhoneFormat
 *
 * Converts phone to format like 79xxxxxxxxx
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
class RusPhoneFormat implements PhoneFormatInterface
{
    /**
     * @param $phone
     * @return string
     */
    public function convert($phone)
    {
        $converted = $this->removeNotNumberChars($phone);
        $converted = $this->setSevenFirstNumber($converted);

        return (int) $converted;
    }

    /**
     * @param $phone
     * @return bool
     */
    public function isCorrect($phone)
    {
        $pattern = '/^79[0-9]{9}$/';

        return !!preg_match($pattern, $phone);
    }

    /**
     * @param $string string
     * @return string
     */
    private function removeNotNumberChars($string)
    {
        $removed = preg_replace('/[^0-9]+/', '', $string);

        return $removed;
    }

    /**
     * @param $phone
     * @return string
     */
    private function setSevenFirstNumber($phone)
    {
        $firstNumber = mb_substr((string) $phone, 0, 1);

        if ('7' === $firstNumber) {
            return $phone;
        }

        if ('8' === $firstNumber) {
            return '7' . mb_substr((string) $phone, 1, strlen($phone));
        }

        return '7' . $phone;
    }
}