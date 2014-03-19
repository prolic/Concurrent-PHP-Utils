<?php

namespace ConcurrentPhpUtilsTest\CyclicBarrier\TestAsset;

use ConcurrentPhpUtils\CyclicBarrier;
use ConcurrentPhpUtils\TimeUnit;

class FunTwo extends \Threaded
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
        $this->barrier->await(100, TimeUnit::MILLISECONDS());
    }
}
