<?php

namespace ConcurrentPhpUtils;

class UuidNoOpStackable extends NoOpStackable
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
     * check if two stackables are the same
     *
     * @param UuidNoOpStackable $other
     * @return bool
     */
    public function equals(self $other)
    {
        $result = (int) uuid_compare($this->hash, $other->hash);
        return 0 == $result;
    }
}
