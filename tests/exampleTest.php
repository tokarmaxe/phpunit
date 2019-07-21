<?php

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function  testAddingTwoPlusTwo()
    {
        $this->assertEquals(4, 2+2);
    }
}