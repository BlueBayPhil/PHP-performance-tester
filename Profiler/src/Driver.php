<?php


namespace Profiler;

/**
 * Class Driver
 *
 * @package Profiler
 * @property string $os
 * @property string $os_version
 * @property string $cpu_manufacturer
 * @property string $cpu_model
 * @property string $cpu_speed
 * @property string $total_memory
 */
abstract class Driver
{
    protected string $os;
    protected string $os_version;
    protected string $cpu_manufacturer;
    protected string $cpu_model;
    protected string $cpu_speed;
    protected string $total_memory;

    public function __get($key){
        return $this->{$key};
    }
}