<?php


namespace App\Tests;


use App\Test;
use App\Timer;

class Arrays extends Test
{
    protected function testAnonymousFunction()
    {
        $data = $this->buildTestData();
        $timer = new Timer();
        $timer->start();
        array_walk($data, function(&$v) {
            $v += 1;
        });
        $timer->end();
        $this->results['testAnonymousFunction'] = $timer->duration;
    }

    protected function testDefinedFunction()
    {

        $data = $this->buildTestData();
        $timer = new Timer();
        $timer->start();
        array_walk($data, "addOne");
        $timer->end();
        $this->results['testDefinedFunction'] = $timer->duration;
    }

    protected function testVariableFunction()
    {
        $addOne = function (&$v) {
            $v += 1;
        };

        $data = $this->buildTestData();
        $timer = new Timer();
        $timer->start();
        array_walk($data, $addOne);
        $timer->end();
        $this->results['testVariableFunction'] = $timer->duration;
    }
}