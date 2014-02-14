<?php

namespace ConcurrentPhpUtilsTest\CountDownLatch\TestAsset;

abstract class AbstractAwaiter extends \Thread
{
    public $result;

    protected function setResult(\Exception $result)
    {
        $this->result = $result;
    }

    public function getResult()
    {
        return $this->result;
    }
}
