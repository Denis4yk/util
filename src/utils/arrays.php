<?php

namespace utils;

/**
 * arrays
 *
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
     * @param int   $n       Number of the first elements. Default is 1. If you try to take more, than
     *                       \OutOfBoundsException will be thrown.
     * @param array $options Additional options
     *
     * @return array/null
     *
     * @throws \OutOfBoundsException
     */
    public static function getFirst(array $array, $n = 1, array $options = ['preserveKeys' => true])
    {
        if ($n > count($array)) {
            throw new \OutOfBoundsException('You are out of the bounds of the array');
        }

        return array_slice($array, 0, $n, $options['preserveKeys']);
    }

    /**
     * @param array $array   Input array
     * @param int   $n       Number of the last elements. Default is 1. If you try to take more, than
     *                       \OutOfBoundsException will be thrown.
     * @param array $options Additional options
     *
     * @return array
     *
     * @throws \OutOfBoundsException
     */
    public static function getLast(array $array, $n = 1, array $options = ['preserveKeys' => false])
    {
        if ($n > count($array)) {
            throw new \OutOfBoundsException('You are out of the bounds of the array');
        }

        return array_slice($array, -$n, $n, $options['preserveKeys']);
    }

    /**
     * Receives an array of values and returns true, if none of the first-level items are empty.
     *
     * ['']  — empty
     * [0]   — empty
     * false - empty
     *
     * [['some' => null]] - NOT empty
     *
     * @param array $array   Input array
     * @param array $options Additional options
     *
     * @return bool
     */
    public static function notEmpty(array $array, array $options = [])
    {
        foreach ($array as $item) {
            if (empty($item)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Receives an array and keys to exclude. Returns an array without excluded keys.
     *
     * @param array            $array       Input array
     * @param array|int|string $excludeKeys Keys to exclude
     * @param array            $options     Additional options
     *
     * @return array
     * @throws \InvalidArgumentException
     */
    public static function getArrayExceptKeys(array $array, $excludeKeys, array $options = [])
    {
        if (!is_string($excludeKeys) && !is_array($excludeKeys) && !is_int($excludeKeys)) {
            throw new \InvalidArgumentException('You have to pass a string, integer or an array as the second argument');
        }

        if (is_string($excludeKeys) || is_int($excludeKeys)) {
            $excludeKeys = [$excludeKeys];
        }

        foreach ($excludeKeys as $key) {
            unset($array[$key]);
        }

        return $array;
    }

    /**
     * Receives an array and returns it with exclueded nulls
     *
     * @param array $array Input array
     *
     * @return array without nulls
     */
    public static function clearNulls(array $array)
    {
        return array_filter($array, function ($value) {
            return !is_null($value);
        });
    }
}