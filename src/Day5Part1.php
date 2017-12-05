<?php

namespace ColinODell\Advent;

class Day5Part1
{
    public function execute($instructions)
    {
        $steps = 0;
        $position = 0;

        // https://youtu.be/KZaz7OqyTHQ?t=24
        while (isset($instructions[$position])) {
            $position += $instructions[$position]++;
            $steps++;
        }

        return $steps;
    }
}
