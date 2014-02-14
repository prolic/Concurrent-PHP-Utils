<?php

namespace ConcurrentPhpUtils;

/**
 * internal class to use in CyclicBarrier implementation
 */
class Generation
{
    public $broken;

    public function __construct()
    {
        $this->broken = false;
    }
}
