<?php

namespace test;

use PHPUnit\Framework\TestCase;
use utils\arrays;
use utils\strings;

/**
 * PHPUnit test case for the utils library string helper
 */
class stringsTest extends TestCase
{
    public function testRoundBrackets()
    {
        $string = 'some';
        $result = '(some)';

        $this->assertEquals($result, strings::roundBrackets($string));

        $string = 1;
        $result = '(1)';

        $this->assertEquals($result, strings::roundBrackets($string));


        try {
            strings::roundBrackets(['some']);
            $this->expectException('InvalidArgumentException');
            $this->fail('No exception');
        } catch (\Exception $exception) {
        }
    }
}
