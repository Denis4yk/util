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
}
