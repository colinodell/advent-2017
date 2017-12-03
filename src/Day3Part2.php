<?php

namespace ColinODell\Advent;

class Day3Part2
{
    public function getFirstValueLargerThan($target)
    {
        // Create a grid; I'm just approximating a decent size here
        $grid = $this->createGrid(ceil(sqrt($target)));

        ksort($grid);

        // Fill the grid; stop once we've hit our target
        $filled = [];
        foreach ($grid as $pos => list($x, $y)) {
            // Position 1 is a special case
            if ($pos === 1) {
                $filled[$x][$y] = 1;
                if ($target === 1) {
                    return 2;
                }
                continue;
            }

            $sum = 0;
            // Sum the values in the 8 surrounding cells (if they are set)
            // $i and $j are offsets between -1 and 1
            for ($i = -1; $i <= 1; $i++) {
                for ($j = -1; $j <= 1; $j++) {
                    if (isset($filled[$x+$i][$y+$j])) {
                        $sum += $filled[$x+$i][$y+$j];
                    }
                }
            }

            // Store the sum
            $filled[$x][$y] = $sum;

            // Have we exceeded that target number?
            if ($sum > $target) {
                return $sum;
            }
        }
    }

    /**
     * @param int $n Size of the grid (well, of one of the sides)
     *
     * @return array Translation table between grid position (numeric) and the x-y coordinates
     */
    private function createGrid($n)
    {
        $grid = [];
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

                $grid[$a] = [$i, $j];
            }
        }

        return $grid;
    }


}
