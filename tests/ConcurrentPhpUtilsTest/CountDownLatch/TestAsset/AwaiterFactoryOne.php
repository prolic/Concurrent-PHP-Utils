<?php

namespace ConcurrentPhpUtilsTest\CountDownLatch\TestAsset;

use ConcurrentPhpUtils\CountDownLatch;

class AwaiterFactoryOne implements AwaiterFactoryInterface
{
    public $latch;

    public $gate;

    public function __construct(CountDownLatch $latch, CountDownLatch $gate)
    {
        $this->latch = $latch;
        $this->gate = $gate;
    }

    /**
     * @return AbstractAwaiter
     */
    public function getAwaiter()
    {
        return new AwaiterOne($this->latch, $this->gate);
    }
}
