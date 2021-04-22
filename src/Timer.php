<?php


namespace App;

/**
 * Class Timer
 *
 * @package App
 * @property float duration
 */
class Timer
{
    protected $start;
    protected $end;
    protected $duration;

    public function start(): void
    {
        $this->start = microtime(true);
    }

    public function end(): void
    {
        $this->end = microtime(true);
        $this->duration = $this->end - $this->start;
    }

    public function __get($key)
    {
        return $this->{$key};
    }
}