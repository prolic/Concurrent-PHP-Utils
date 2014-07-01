<?php

namespace ConcurrentPhpUtils;

/**
 * Trait CasThreadedMemberTrait
 *
 * This trait is intended to use with Threaded, Thread and Worker classes (pthreads)
 */
trait CasThreadedMemberTrait
{
    /**
     * Performs a compare and swap operation on a class member
     *
     * @param string $member
     * @param mixed $oldValue
     * @param mixed $newValue
     * @return bool
     */
    public function casMember($member, $oldValue, $newValue)
    {
        $set = false;

        $this->lock();
        if ($this[$member] == $oldValue) {
            $this[$member] = $newValue;

            $set = true;
        }
        $this->unlock();

        return $set;
    }
}
