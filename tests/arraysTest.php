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
        $this->assertEquals($array, arrays::getFirst($array, 3));

        $array = [4 => 1, 2 => 2, 8 => 3];
        $this->assertEquals([0 => 1, 1 => 2], arrays::getFirst($array, 2, ['preserveKeys' => false]));
    }

    //TODO make normal exception handling
    public function testGetLast()
    {
        $array  = [1 => 1, 2, 2 => 3, 4];
        $result = [3, 4];
        $this->assertEquals($result, arrays::getLast($array, 2));

        $array = null;
        try {
            arrays::getLast($array, 2);
            $this->fail('No exception');
        } catch (\PHPUnit_Framework_Error $exception) {
            $this->expectException(\Exception::class);
        }
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
    }
}
