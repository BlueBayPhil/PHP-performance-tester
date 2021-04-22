<?php


namespace App\Tests;


use App\Test;
use App\Timer;

class Collections extends Test
{
    protected function testAnonymousFunction()
    {
        $data = collect($this->buildTestData());
        $timer = new Timer();
        $timer->start();
        $data->each(function(&$v) {
            $v += 1;
        });
        $timer->end();
        $this->results['testAnonymousFunction'] = $timer->duration;
    }

    protected function testDefinedFunction()
    {

        $data = collect($this->buildTestData());
        $timer = new Timer();
        $timer->start();
        $data->each("addOne");
        $timer->end();
        $this->results['testDefinedFunction'] = $timer->duration;
    }

    protected function testVariableFunction()
    {
        $addOne = function (&$v) {
            $v += 1;
        };

        $data = collect($this->buildTestData());
        $timer = new Timer();
        $timer->start();
        $data->each($addOne);
        $timer->end();
        $this->results['testVariableFunction'] = $timer->duration;
    }
}