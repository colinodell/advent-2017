<?php

namespace ColinODell\Advent;

class Day15
{
    public function run($startValA, $startValB, $times, $ifMultipleOfA = 1, $ifMultipleOfB = 1)
    {
        $f = function($start, $factor, $ifMultipleOf) {
            while (true) {
                $start = ($start * $factor) % 2147483647;
                if ($start % $ifMultipleOf === 0) {
                    yield $start;
                }
            }
        };

        $a = $f($startValA, 16807, $ifMultipleOfA);
        $b = $f($startValB, 48271, $ifMultipleOfB);

        $count = 0;
        while ($times--) {
            if (($a->current() & 0xFFFF) === ($b->current() & 0xFFFF)) {
                $count++;
            }

            $a->next();
            $b->next();
        }

        return $count;
    }
}
