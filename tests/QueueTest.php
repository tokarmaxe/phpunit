<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected static $queue;

    protected function setUp():void
    {
        static::$queue->clear();
    }

    public static function setUpBeforeClass()
    {
        static::$queue = new Queue;
    }

    public static function tearDownAfterClass()
    {
        static::$queue = null;
    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, static::$queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue()
    {
        static::$queue->push('green');

        $this->assertEquals(1, static::$queue->getCount());
    }

    public function testAnItemRemovedFromTheQueue()
    {
        static::$queue->push('green');

        $item = static::$queue->pop();

        $this->assertEquals(0, static::$queue->getCount());
    }

    public function testAnItemIsRemovedFromTheFrontofTheQueue()
    {
        static::$queue->push('first');
        static::$queue->push('second');

        $this->assertEquals('first',static::$queue->pop());
    }

    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i=0;$i<Queue::MAX_ITEMS;$i++){
            static::$queue->push($i);
        }

        $this->assertEquals(Queue::MAX_ITEMS, static::$queue->getCount());

        return static::$queue;
    }

    public function testExceptionThrownWhenAddingAnItemToAFullQueue()
    {
        for ($i=0;$i<Queue::MAX_ITEMS;$i++){
            static::$queue->push($i);
        }

        $this->expectException(QueueException::class);
        $this->expectExceptionMessage("Queue is full");

        static::$queue->push("water thin mint");
    }
}