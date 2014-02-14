<?php

namespace ConcurrentPhpUtilsTest\CountDownLatch\TestAsset;

use ConcurrentPhpUtils\CountDownLatch;
use ConcurrentPhpUtils\TimeUnit;

class AwaiterTwo extends AbstractAwaiter
{
    public $latch;

    public $gate;

    public $millis;

    public $unit;

    public function __construct(CountDownLatch $latch, CountDownLatch $gate, $millis)
    {
        $this->latch = $latch;
        $this->gate = $gate;
        $this->millis = $millis;
    }

    public function run()
    {
        $this->gate->countDown();
        try {
            $this->latch->await($this->millis * 1000);
        } catch (\Exception $e) {
            $this->setResult($e);
        }
    }
}
