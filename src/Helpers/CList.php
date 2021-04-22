<?php

namespace App\Helpers;

class CList
{
    private $rows = [];
    private $strLen = 0;

    public function addRow($key, $value)
    {
        $this->rows[$key] = $value;
        if ($this->strLen < strlen($key)) {
            $this->strLen = strlen($key);
        }
    }

    public function add(array $rows)
    {
        foreach ($rows as $key => $value) {
            $this->addRow($key, $value);
        }
    }

    public function display()
    {
        foreach ($this->rows as $key => $value) {
            echo str_pad($key, $this->strLen, ' ') . "\t:\t" . $value . PHP_EOL;
        }

        echo PHP_EOL;
    }
}