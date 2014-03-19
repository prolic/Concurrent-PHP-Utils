<?php

namespace ConcurrentPhpUtilsTest\CyclicBarrier\TestAsset;

use ConcurrentPhpUtils\CyclicBarrier;
use ConcurrentPhpUtils\Exception;
use Thread;

abstract class AbstractAwaiter extends Thread
{
    public $name;

    public $result;

    /**
     * @var CyclicBarrier
     */
    public $atTheStartingGate;

    public function setResult($result)
    {
        $this->result = $result;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function getName()
    {
        return $this->name;
    }

    public function kill()
    {
        parent::kill();
    }

    public function toTheStartingGate()
    {
        try {
            $this->atTheStartingGate->await(10000000); // 10 seks
        } catch (\Exception $e) {
            $this->reset();
            throw $e;
        }
    }

    public function reset()
    {
        $barrier = $this->atTheStartingGate;
        $barrier->reset();
        if ($barrier->isBroken()) {
            throw new \Exception('assertion failed in CyclicBarrierTest: expected broken = false');
        }
        if (0 != $barrier->getNumberWaiting()) {
            throw new \Exception('assertion failed in CyclicBarrierTest: expected number of waiting = 0');
        }
    }
}
