<?php

namespace ColinODell\Advent;

class Day3Part1
{
    public function getSteps($target)
    {
        // Calculate the smallest grid size needed to contain this number
        $n = ceil(sqrt($target));
        // Number must always be odd
        if ($n % 2 === 0) {
            $n++;
        }

        // Calculations for $x and $a shamelessly stolen from http://www.geeksforgeeks.org/print-n-x-n-spiral-matrix-using-o1-extra-space/
        // Basically, the two loops here are iterating through the grid and calculating
        // the value at the given position ($a).
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $x = min(min($i, $j), min($n-1-$i, $n-1-$j));

                if ($i <= $j) {
                    $a = ($n-2*$x)*($n-2*$x) - ($i-$x) - ($j - $x);
                } else {
                    $a = ($n-2*$x-2)*($n-2*$x-2)+($i-$x)+($j-$x);
                }

                // Have we arrived at our target number?
                if ($a == $target) {
                    // The current position is [$i, $j]
                    // The center position is [($n-1)/2, ($n-1)/2]
                    // We now calculate the distance and return that answer:
                    $answer = abs($i-($n-1)/2) + abs($j-($n-1)/2);

                    return (int)$answer;
                }
            }
        }
    }
}
