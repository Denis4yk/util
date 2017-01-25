<?php

namespace test;

use PHPUnit\Framework\TestCase;
use utils\arrays;

/**
 * PHPUnit test case for the utils library array helper
 */
class arraysTest extends TestCase
{
    public function testGetFirst()
    {
        $array = [1, 2, 3, 4];
        $this->assertEquals([1], arrays::getFirst($array));

        $array = [4 => 1, 2 => 2, 8 => 3];
        $this->assertEquals([4 => 1, 2 => 2], arrays::getFirst($array, 2));

        $array = [1];
        try {
            arrays::getFirst($array, 3);
            $this->expectException('OutOfBoundsException');
            $this->fail('No exception');
        } catch (\Exception $exception) {
        }

        $array  = [4 => 1, 2 => 2, 8 => 3];
        $result = [4 => 1, 2 => 2];
        $this->assertEquals($result, arrays::getFirst($array, 2, ['preserveKeys' => true]));
    }

    //TODO make normal exception handling
    public function testGetLast()
    {
        $array  = [1, 2, 3, 4];
        $result = [4];
        $this->assertEquals($result, arrays::getLast($array));

        $array  = [4 => 1, 2 => 2, 8 => 3];
        $result = [0 => 2, 1 => 3];
        $this->assertEquals($result, arrays::getLast($array, 2));

        $array = [1];
        try {
            arrays::getLast($array, 3);
            $this->expectException('OutOfBoundsException');
            $this->fail('No exception');
        } catch (\Exception $exception) {
        }

        $array = [4 => 1, 2 => 2, 8 => 3];
        $this->assertEquals([2 => 2, 8 => 3], arrays::getLast($array, 2, ['preserveKeys' => true]));
    }


    public function testNotEmpty()
    {
        $array = ['a' => null];
        $this->assertFalse(arrays::notEmpty($array));

        $array = [1, 2, 3];
        $this->assertTrue(arrays::notEmpty($array));

        $array = [1, 'soma' => ['a' => null], 3];
        $this->assertTrue(arrays::notEmpty($array));

        $array = [1, ''];
        $this->assertFalse(arrays::notEmpty($array));

        $array = [1, 0];
        $this->assertFalse(arrays::notEmpty($array));

        $array = [false, true];
        $this->assertFalse(arrays::notEmpty($array));
    }

    public function testGetArrayExceptKeys()
    {
        $array        = ['some'];
        $excludedKeys = [0];
        $result       = [];
        $this->assertEquals($result, arrays::getArrayExceptKeys($array, $excludedKeys));

        $array        = [1 => 'some'];
        $excludedKeys = [0];
        $result       = [1 => 'some'];
        $this->assertEquals($result, arrays::getArrayExceptKeys($array, $excludedKeys));

        $array        = [1 => 'some'];
        $excludedKeys = [1 => 'some'];
        $result       = [1 => 'some'];
        $this->assertEquals($result, arrays::getArrayExceptKeys($array, $excludedKeys));

        $array        = [1 => 'some'];
        $excludedKeys = 1;
        $result       = [];
        $this->assertEquals($result, arrays::getArrayExceptKeys($array, $excludedKeys));

        $array        = [1 => 'some'];
        $excludedKeys = '1';
        $result       = [];
        $this->assertEquals($result, arrays::getArrayExceptKeys($array, $excludedKeys));

        $array        = [1 => 'some'];
        $excludedKeys = [];
        $result       = [1 => 'some'];
        $this->assertEquals($result, arrays::getArrayExceptKeys($array, $excludedKeys));

        $array        = [1 => 'some'];
        $excludedKeys = [2 => 1];
        $result       = [];
        $this->assertEquals($result, arrays::getArrayExceptKeys($array, $excludedKeys));

        $array        = [1 => 'some'];
        $excludedKeys = [1 => 2];
        $result       = [1 => 'some'];
        $this->assertEquals($result, arrays::getArrayExceptKeys($array, $excludedKeys));

        $array        = [6 => 'some', 'else', 2 => 4, 6];
        $excludedKeys = [7, 2];
        $result       = [6 => 'some', 8 => 6];
        $this->assertEquals($result, arrays::getArrayExceptKeys($array, $excludedKeys));
    }
}
