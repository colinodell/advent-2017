<?php

namespace ColinODell\Advent;

class Day5Part2
{
    public function execute($instructions)
    {
        $steps = 0;
        $position = 0;

        // https://youtu.be/KZaz7OqyTHQ?t=24
        while (isset($instructions[$position])) {
            if ($instructions[$position] >= 3) {
                $position += $instructions[$position]--;
            } else {
                $position += $instructions[$position]++;
            }

            $steps++;
        }

        return $steps;
    }
}
