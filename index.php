<?php

use App\Helpers\CList;
use Profiler\Profiler;

require "vendor/autoload.php";

$options = $argv;
array_shift($options);

if (($key = in_array('--data-size', $options)) !== false) {
    $dataSize = substr($options[$key], 12);
    unset($options[$key]);
} else {
    $dataSize = 1000000;
}

$tests = [
    "loops"       => \App\Tests\Loops::class,
    "arrays"      => \App\Tests\Arrays::class,
    "collections" => \App\Tests\Collections::class,
];

/**
 * The function that is used by tests to perform a simple operation
 *
 * $v int Reference to the number to transform
**/
function addOne(&$v)
{
    $v += 1;
}

if(count($options) > 0) {
    foreach ($tests as $test => $class) {
        if (!in_array($test, $options)) {
            unset($tests[$test]);
        }
    }
}

$profiler = Profiler::Factory();

echo "Test Environment:\n";
$list = new CList();
$list->addRow("Operating System", $profiler->os . ' - ' . $profiler->os_version);
$list->addRow("CPU", $profiler->cpu_model . ' - ' . $profiler->cpu_speed);
$list->addRow("Memory", $profiler->total_memory);
$list->display();

echo "Test data sample size: $dataSize\n";

if (count($tests) < 1) {
    echo "No tests to run.\n";
}

foreach ($tests as $key => $test) {
    echo "Running Test Profile: " . $key . PHP_EOL;
    (new $test())->run()->display();
    echo PHP_EOL;
}
