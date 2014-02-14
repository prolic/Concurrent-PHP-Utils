<?php

namespace ConcurrentPhpUtilsTest\CountDownLatch\TestAsset;

interface AwaiterFactoryInterface
{
    /**
     * @return AbstractAwaiter
     */
    public function getAwaiter();
}
