<?php

namespace ColinODell\Advent;

class Day1Part1
{
    public function getAnswer($input)
    {
        $matches = [];
        // Uses a positive-lookahead back-reference :)
        preg_match_all('/(\d)(?=\1)/', $input . $input[0], $matches);

        return array_sum($matches[1]);
    }
}
