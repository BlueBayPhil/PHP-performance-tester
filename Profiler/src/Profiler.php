<?php

namespace Profiler;

use Profiler\Exceptions\UnknownOSException;

class Profiler
{
    public static function Factory(): Driver
    {
        $class = self::getDriverClass();

        return new $class();
    }

    /**
     * @return bool
     * @throws UnknownOSException
     */
    private static function getDriverClass()
    {
        $osDict = include __DIR__ . '/OperatingSystems.php';

        if (array_key_exists(PHP_OS, $osDict)) {
            return $osDict[PHP_OS];
        }

        throw new UnknownOSException();
    }
}