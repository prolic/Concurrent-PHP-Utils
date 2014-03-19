<?php

namespace ConcurrentPhpUtilsTest\CyclicBarrier\TestAsset;

use ConcurrentPhpUtils\CyclicBarrier;
use ConcurrentPhpUtils\Exception\InterruptedException;

class AwaiterTwo extends AbstractAwaiter
{
    public $barrier;

    public $micros;

    public $atTheStartingGate;

    public function __construct(CyclicBarrier $barrier, CyclicBarrier $atTheStartingGate, $micros)
    {
        $this->name = 'AwaiterTwo';
        $this->barrier = $barrier;
        $this->micros = $micros;
        $this->atTheStartingGate = $atTheStartingGate;
        $this->result = null;
    }

    public function run()
    {
        $this->toTheStartingGate();
        try {
            $this->barrier->await($this->micros);
        } catch (\Exception $e) {
            var_dump($e);
            $this->setResult(get_class($e));
        }
    }
}
