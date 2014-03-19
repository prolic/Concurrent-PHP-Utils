<?php

namespace ConcurrentPhpUtils;

use Threaded;

class UuidThreaded extends Threaded
{
    /**
     * @var string
     */
    public $hash;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->hash = uuid_create();
    }

    /**
     * Check if two stackables are the same
     *
     * @param UuidThreaded $other
     * @return bool
     */
    public function equals(self $other)
    {
        $result = (int) uuid_compare($this->hash, $other->hash);
        return 0 == $result;
    }
}
