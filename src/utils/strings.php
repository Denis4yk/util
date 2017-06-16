<?php

namespace utils;

/**
 * strings
 *
 * @package utils
 *
 * String manipulation part of the utils package with helpful functions.
 *
 * @author  Denis Riabiy <riabiy.denis@gmail.com>
 */
class strings
{
    private static function canBeString($var)
    {
        return $var === null || is_scalar($var) || (is_object($var) && method_exists($var, '__toString'));
    }


    /**
     * Wrap a string into round brackets.
     *
     * Examples:
     *
     * 'some'   => '(some)'
     * 'else'   => '(else)'
     *
     *  1       => '(1)'
     *
     *
     * @param $sting
     *
     * @return string
     * @throws \InvalidArgumentException
     */
    public static function roundBrackets($sting)
    {
        if (!self::canBeString($sting)) {
            throw new \InvalidArgumentException('The passed variable must be convertable to string');
        }
        return '(' . $sting . ')';
    }
}