<?php

namespace ColinODell\Advent;

class Day17
{
    public function step1($skip)
    {
        $buffer = [0];
        $pos = 0;

        for ($i = 1; $i <= 2017; $i++) {
            $pos = (($pos + $skip) % $i) + 1;
            array_splice($buffer, $pos, 0, [$i]);
        }

        return $buffer[$pos+1];
    }

    public function step2($skip, $insertions = 2017)
    {
        $pos = 0;

        for ($i = 1; $i <= $insertions; $i++) {
            $pos = (($pos + $skip) % $i) + 1;
            if ($pos === 1) {
                $whatsInSlot1 = $i;
            }
        }

        return $whatsInSlot1;
    }
}
