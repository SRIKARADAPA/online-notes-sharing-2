<?php

// namespace Foo;

use PHPUnit\Framework\TestCase;
// use Foo\Bar;

class AllUnitTest extends TestCase
{

    public function testCanBeNegated()
    {
 
        // Assert
        $this->assertEquals(-1, -1);
    }

    public function testFalse()
    {
        $this->assertEquals(1, 1);
    }
}
