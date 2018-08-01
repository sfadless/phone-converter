<?php

namespace Sfadless\PhoneConverter;

/**
 * PhoneFormatInterface
 *
 * @author Pavel Golikov <pgolikov327@gmail.com>
 */
interface PhoneFormatInterface
{
    /**
     * @param $phone
     * @return mixed
     */
    public function convert($phone);

    /**
     * @param $phone
     * @return boolean
     */
    public function isCorrect($phone);
}