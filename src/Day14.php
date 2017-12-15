<?php

namespace ColinODell\Advent;

class Day14
{
    public function run($key)
    {
        $numberOfOnes = 0;
        for ($i = 0; $i < 128; $i++) {
            $rowKey = $key.'-'.$i;
            $hash = (new Day10Part2())->hash($rowKey);
            foreach (str_split($hash, 2) as $byte) {
                $numberOfOnes += $this->countSetBits(hexdec($byte));
            }
        }

        return $numberOfOnes;
    }

    private function countSetBits($value)
    {
        $count = 0;
        while($value) {
            if ($value & 1) {
                $count++;
            }

            $value >>= 1;
        }

        return $count;
    }
}
