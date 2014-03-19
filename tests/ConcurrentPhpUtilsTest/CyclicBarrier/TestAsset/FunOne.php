<?php

namespace ConcurrentPhpUtilsTest\CyclicBarrier\TestAsset;

use ConcurrentPhpUtils\CyclicBarrier;

class FunOne extends \Threaded
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
