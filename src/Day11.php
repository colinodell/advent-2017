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
        $maxes = [];
        $maxDist = 0;
        for ($i = $cnt; $i >= $maxDist; $i-=2) {
            $distance = $this->getShortestPathSize(array_slice($moves, 0, $i));
            $maxes[$distance][] = $i;
            $maxDist = max($maxDist, $distance);
            var_dump([$i => $distance]);
        }

        // Find the largest key
        $maxDist = max(array_keys($maxes));
        foreach ($maxes[$maxDist] as $possibleMax) {
            // Try 1 above and 1 below
            $distanceOneLess = $this->getShortestPathSize(array_slice($moves, 0, $possibleMax-1));
            $distanceOneMore = $this->getShortestPathSize(array_slice($moves, 0, $possibleMax+1));
            $maxDist = max($maxDist, $distanceOneLess, $distanceOneMore);
        }

        return $maxDist;
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
