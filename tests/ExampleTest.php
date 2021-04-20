<?php

use \PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testAddingTwoPlusTwoResultsInFour()
    {
        $this->assertEquals(4, 2 + 2);
    }

    protected function tearDown(): void
    {
        \Mockery::close();
    }
}
