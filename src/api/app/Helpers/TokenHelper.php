<?php
/**
 * Class TokenHelper
 * Author: William Rich
 *
 * A class for generating tokens for use in email verification & Password resets
 */
namespace App\Helpers;

class TokenHelper
{

    /**
     * @param int $length
     * @return false|string
     */
    static function generateToken($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            ceil($length / strlen($x)))), 1, $length);
    }
}
