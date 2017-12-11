<?php

namespace ColinODell\Advent;

class Day11
{
    public function getShortestPathSize($moves)
    {
        if (is_string($moves)) {
            $moves = explode(',', $moves);
        }

        $tryAgain = true;
        while($tryAgain) {
            $tryAgain = false;
            // Reduce exact opposites into 0 moves
            $tryAgain |= $this->tryToReduce($moves, ['ne', 'sw'], null);
            $tryAgain |= $this->tryToReduce($moves, ['nw', 'se'], null);
            $tryAgain |= $this->tryToReduce($moves, ['n', 's'], null);
            // Reduce 2 moves into 1 move
            $tryAgain |= $this->tryToReduce($moves, ['n', 'se'], 'ne');
            $tryAgain |= $this->tryToReduce($moves, ['ne', 's'], 'se');
            $tryAgain |= $this->tryToReduce($moves, ['se', 'sw'], 's');
            $tryAgain |= $this->tryToReduce($moves, ['s', 'nw'], 'sw');
            $tryAgain |= $this->tryToReduce($moves, ['sw', 'n'], 'nw');
            $tryAgain |= $this->tryToReduce($moves, ['nw', 'ne'], 'n');
        }

        return count($moves);
    }

    public function getFurthestDistanceEver($moves)
    {
        if (is_string($moves)) {
            $moves = explode(',', $moves);
        }

        $cnt = count($moves);
        $furthest = 0;
        for ($i = $cnt; $i >= $furthest; $i--) {
            $furthest = max($furthest, $this->getShortestPathSize(array_slice($moves, 0, $i)));
        }

        return $furthest;
    }

    private function tryToReduce(array &$moves, $find, $replace)
    {
        $keysMatched = [];
        foreach ((array)$find as $match) {
            if (($key = array_search($match, $moves)) === false) {
                return false;
            }

            $keysMatched[] = $key;
        }

        foreach ($keysMatched as $key) {
            unset($moves[$key]);
        }

        if (empty($replace)) {
            // No replacements
            return true;
        }

        $moves[] = $replace;

        return true;
    }
}
