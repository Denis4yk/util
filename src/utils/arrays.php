<?php
namespace utils;

/**
 * arrays
 * @package utils
 *
 * Part of the utils package with helpful functions.
 *
 * @author  Denis Riabiy <riabiy.denis@gmail.com>
 */
class arrays
{
    /**
     * @param array $array   Input array
     * @param int   $n       Number of first elements. Default is 1. If you try to take more, than the input array
     *                       contains, it will return the input array.
     * @param array $options Additional options
     *
     * @return array/null
     */
    public static function getFirst(array $array, $n = 1, array $options = ['preserveKeys' => true])
    {
        if ($array !== null) {
            return array_slice($array, 0, $n, $options['preserveKeys']);
        } else {
            return null;
        }
    }


    /**
     * Receives an array of values and returns true, if none of the first-level items are empty.
     *
     * [''] — empty
     * [0]  — empty
     *
     * [['some' => null]] - NOT empty
     *
     * @param array $array   Input array
     * @param bool  $reverse If it's true, it will work vice versa. Default value is false.
     * @param array $options Additional options
     *
     *
     * @return bool
     */
    public static function notEmpty(array $array, $reverse = false, array $options = [])
    {
        foreach ($array as $item) {
            if (empty($item)) {
                return $reverse ? true : false;
            }
        }

        return $reverse ? false : true;
    }
}