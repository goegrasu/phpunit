<?php

use PHPUnit\Framework\TestCase;

class QueueExceptionsTest extends TestCase
{

    protected $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue();
    }

    protected function tearDown(): void
    {
        /**
         * Method is used frequently when you have external resources.
         * Files, network sockets, etc
         */
        unset($this->queue);
    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, $this->queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue()
    {
        $this->queue->push('green');

        $this->assertEquals(
            1,
            $this->queue->getCount()
        );
    }

    public function testAnItemIsRemovedFromTheQueue()
    {
        $this->queue->push('green');
        $this->queue->push('red');

        $this->assertEquals(2, $this->queue->getCount());

        $item = $this->queue->pop();

        $this->assertEquals(1, $this->queue->getCount());

        $this->assertEquals('green', $item);
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        $this->queue->push('first');
        $this->queue->push('second');

        $this->assertEquals('first', $this->queue->pop());
    }

    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }

        $this->assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());
    }

    public function testExceptionThrownWhenAddingAnItemToAFullQueue()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }

        $this->expectException(QueueException::class);
        $this->expectExceptionMessage("Queue is full");
        $this->queue->push(($i + 1));
    }
}
