<?php

namespace ColinODell\Advent;

class Day10Part1
{
    private $size;

    public function __construct(int $size = 256)
    {
        $this->size = $size;
    }

    public function hash(...$inputLengths)
    {
        $pos = 0;
        $arr = range(0, $this->size-1);
        $skip = 0;

        foreach ($inputLengths as $length) {
            $subslice = [];
            for ($i = 0; $i < $length; $i++) {
                $subslice[] = $arr[($pos + $i) % $this->size];
            }
            $subslice = array_reverse($subslice);
            for ($i = 0; $i < $length; $i++) {
                $arr[($pos + $i) % $this->size] = $subslice[$i];
            }

            $pos += $length + $skip++;
        }

        return $arr[0] * $arr[1];
    }
}
