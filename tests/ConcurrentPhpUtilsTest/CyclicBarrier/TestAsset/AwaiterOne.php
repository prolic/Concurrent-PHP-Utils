<?php

namespace ConcurrentPhpUtilsTest\CyclicBarrier\TestAsset;

use ConcurrentPhpUtils\CyclicBarrier;
use ConcurrentPhpUtils\Exception\InterruptedException;

class AwaiterOne extends AbstractAwaiter
{
    public $barrier;

    public $atTheStartingGate;

    public function __construct(CyclicBarrier $barrier, CyclicBarrier $atTheStartingGate)
    {
        $this->name = 'AwaiterOne';
        $this->barrier = $barrier;
        $this->atTheStartingGate = $atTheStartingGate;
        $this->result = null;
    }

    public function run()
    {
        $this->toTheStartingGate();
        try {
            $this->barrier->await();
        } catch (\Exception $e) {
            $this->setResult(get_class($e));
        }
    }
}
