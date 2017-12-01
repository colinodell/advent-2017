<?php

namespace ColinODell\Advent;

class Day1Part2
{
    public function getAnswer($input)
    {
        $sum = 0;
        $count = strlen($input);
        // I take the lazy approach instead of implementing wrap-around math logic
        $chars = str_split($input.$input);

        // $i is the current position, $j is the position of the character "half way around"
        for ($i = 0, $j = $count / 2; $i < $count; $i++, $j++) {
            if ($chars[$i] === $chars[$j]) {
                $sum += $chars[$i];
            }
        }

        return $sum;
    }
}
