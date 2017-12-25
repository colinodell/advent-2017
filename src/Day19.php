<?php

namespace ColinODell\Advent;

class Day19
{
    public function run(string $input) : array
    {
        $maze = [];
        foreach (preg_split('/[\r\n]+/', $input) as $line) {
            $maze[] = str_split($line);
        }

        $charsFound = [];

        // Find the start
        $currentPos = [array_search('|', $maze[0]), 0];
        $lastPos = [$currentPos[0], -1];
        $steps = 1;

        while ($nextPos = $this->getNextPos($maze, $currentPos, $lastPos)) {
            $steps++;
            $char = $maze[$nextPos[1]][$nextPos[0]];
            if (preg_match('/[A-Z]/', $char) === 1) {
                $charsFound[] = $char;
            }

            $lastPos = $currentPos;
            $currentPos = $nextPos;
        }

        return [implode('', $charsFound), $steps];
    }

    private function getNextPos(array $maze, array $currentPos, array $lastPos)
    {
        $currentDirection = [$currentPos[0] - $lastPos[0], $currentPos[1] - $lastPos[1]];
        list($x, $y) = $currentPos;

        // Up
        if ($y > 0 && $maze[$y-1][$x] !== ' ') {
            $try[] = [$x, $y-1];
        }

        // Down
        if ($y < (count($maze) - 2) && $maze[$y+1][$x] !== ' ') {
            $try[] = [$x, $y+1];
        }

        // Left
        if ($x > 0 && $maze[$y][$x-1] !== ' ') {
            $try[] = [$x-1, $y];
        }

        // Right
        if ($x < count($maze[$y]) && $maze[$y][$x+1] !== ' ') {
            $try[] = [$x+1, $y];
        }

        // Can we keep moving in the same direction?
        if (array_search([$x + $currentDirection[0], $y + $currentDirection[1]], $try) !== false) {
            return [$x + $currentDirection[0], $y + $currentDirection[1]];
        }

        // Okay, we're changing direction.
        foreach ($try as list($newX, $newY)) {
            if ($newX !== $lastPos[0] && $newY !== $lastPos[1]) {
                return [$newX, $newY];
            }
        }

        return null;
    }
}
