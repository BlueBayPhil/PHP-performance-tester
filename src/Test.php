<?php


namespace App;


use App\Helpers\CList;

abstract class Test
{
    protected $dataSize;
    protected $results = [];
    private $tableRowLength = 0;

    public function __construct($dataSize = 1000000)
    {
        $this->dataSize = $dataSize;
    }

    public final function run(): Test
    {
        $methods = get_class_methods(get_called_class());

        $tests = array_filter($methods, fn ($v) => substr($v, 0, 4) === 'test');

        foreach ($tests as $test) {
            call_user_func([$this, $test]);
        }

        return $this;
    }

    public function display(): void
    {
        uasort($this->results, fn ($a, $b) => $a > $b);

        $list = new CList();
        $list->add($this->results);

        $list->display();
    }

    protected function buildTestData()
    {
        $out = [];
        for ($i = 0; $i < $this->dataSize; $i++) {
            $out[] = $i;
        }
        return $out;
    }
}