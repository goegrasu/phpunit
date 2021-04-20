<?php

use PHPUnit\Framework\TestCase;

class QueueFixturesClassTest extends TestCase
{

    protected static $queue;

    public static function setUpBeforeClass(): void
    {
        static::$queue = new Queue;
    }

    public static function tearDownAfterClass(): void
    {
        static::$queue = null;
    }

    protected function setUp(): void
    {
        static::$queue->clear();
    }

    protected function tearDown(): void
    {
    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, static::$queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue()
    {
        static::$queue->push('green');

        $this->assertEquals(
            1,
            static::$queue->getCount()
        );
    }

    public function testAnItemIsRemovedFromTheQueue()
    {
        static::$queue->push('green');
        static::$queue->push('red');

        $this->assertEquals(2, static::$queue->getCount());

        $item = static::$queue->pop();

        $this->assertEquals(1, static::$queue->getCount());

        $this->assertEquals('green', $item);
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        static::$queue->push('first');
        static::$queue->push('second');

        $this->assertEquals('first', static::$queue->pop());
    }
}
