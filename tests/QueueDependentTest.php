<?php

use PHPUnit\Framework\TestCase;

class QueueDependentTest extends TestCase
{

    public function testNewQueueIsEmpty()
    {
        $queue = new Queue();
        $this->assertEquals(0, $queue->getCount());

        return $queue;
    }

    /**
     * @depends testNewQueueIsEmpty
     */
    public function testAnItemIsAddedToTheQueue(Queue $queue)
    {
        $queue->push('green');

        $this->assertEquals(
            1,
            $queue->getCount()
        );

        return $queue;
    }

    /**
     * @depends testAnItemIsAddedToTheQueue
     */
    public function testAnItemIsRemovedFromTheQueue(Queue $queue)
    {
        $queue->push('red');

        $this->assertEquals(2, $queue->getCount());

        $item = $queue->pop();

        $this->assertEquals(1, $queue->getCount());

        $this->assertEquals('green', $item);
    }
}
