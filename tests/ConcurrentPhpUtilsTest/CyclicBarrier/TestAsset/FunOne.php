<?php

namespace ConcurrentPhpUtilsTest\CyclicBarrier\TestAsset;

use ConcurrentPhpUtils\CyclicBarrier;
use ConcurrentPhpUtils\NoOpStackable;

class FunOne extends NoOpStackable
{
    /**
     * @var CyclicBarrier
     */
    public $barrier;

    public function __construct(CyclicBarrier $barrier)
    {
        $this->barrier = $barrier;
    }

    public function f()
    {
        $this->barrier->await();
    }
}
