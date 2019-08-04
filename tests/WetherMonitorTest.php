<?php

use PHPUnit\Framework\TestCase;

class WetherMonitorTest extends TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function testCorrectAvarageIsReturned()
    {
        $service = $this->createMock(TemperatureService::class);

        $map=[
            ['12:00', 20],
            ['14:00', 26]
        ];

        $service->expects($this->exactly(2))
            ->method('getTemperature')
        ->will($this->returnValueMap($map));

        $wether = new WetherMonitor($service);

        $this->assertEquals(23, $wether->getAverageTemperature("12:00","14:00"));

    }

    public function testCorrectAvarageIsReturnedMockery()
    {
        $service = Mockery::mock(TemperatureService::class);

        $service->shouldReceive('getTemperature')->once()->with('12:00')->andReturn(20);
        $service->shouldReceive('getTemperature')->once()->with('14:00')->andReturn(26);

        $wether = new WetherMonitor($service);

        $this->assertEquals(23, $wether->getAverageTemperature("12:00","14:00"));
    }
}