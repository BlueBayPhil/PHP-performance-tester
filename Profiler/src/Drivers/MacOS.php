<?php


namespace Profiler\Drivers;


use Profiler\Driver;

class MacOS extends Driver
{
    protected string $os;
    protected string $os_version;
    protected string $cpu_manufacturer;
    protected string $cpu_model;
    protected string $cpu_speed;
    protected string $total_memory;

    public function __construct()
    {
        $data = [];
        exec("system_profiler SPHardwareDataType", $data);

        $this->cpu_model = trim(explode(':', $data[6])[1]);
        $this->cpu_speed = trim(explode(':', $data[7])[1]);
        $this->total_memory = trim(explode(':', $data[13])[1]);

        exec("system_profiler SPSoftwareDataType", $data);

        $this->os = "MacOS";
        $this->os_version = substr($data[24], 21);

        unset($data);
    }
}