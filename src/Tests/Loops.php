<?php

namespace App\Tests;

use App\Test;
use App\TestInterface;
use App\Timer;

class Loops extends Test
{
    protected function testForLoop()
    {
        $testData = $this->buildTestData();
        $timer = new Timer();
        $timer->start();
        for ($i = 0; $i < count($testData); $i++) {
            addOne($testData[$i]);
        }
        $timer->end();
        $this->addTimer("testForLoop", $timer);
    }

    protected function testForLoopCounted()
    {
        $testData = $this->buildTestData();
        $timer = new Timer();
        $timer->start();
        for ($i = 0, $c = count($testData); $i < $c; $i++) {
            addOne($testData[$i]);
        }
        $timer->end();
        $this->addTimer("testForLoopCounted", $timer);
    }

    protected function testForeachLoop()
    {
        $testData = $this->buildTestData();
        $timer = new Timer();
        $str = implode(':', $testData);
        $timer->start();
        foreach (explode(':', $str) as $number) {
            addOne($number);
        }
        $timer->end();
        $this->addtimer("testForeachLoop", $timer);
    }

    protected function testForeachLoopPrepared()
    {
        $testData = $this->buildTestData();
        $timer = new Timer();
        $timer->start();
        foreach ($testData as $number) {
            addOne($number);
        }
        $timer->end();
        $this->addTimer("testForeachLoopPrepared", $timer);
    }

    private function addTimer($test, $timer)
    {
        $this->results[$test] = $timer->duration;
    }
}