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
            $that = $this;
            register_shutdown_function(function() use ($that) {
                echo 'm�h';
                $that->setResult(new InterruptedException());
                var_dump($that->result);
            });
            $this->barrier->await();
            register_shutdown_function(function() {
                exit();
            });
        } catch (\Exception $e) {
            $this->setResult($e);
        }
    }
}
