<?php

namespace ColinODell\Advent;

class Day13
{
    public function run($input)
    {
        $severity = 0;

        foreach (preg_split('/[\r\n]+/', trim($input)) as $line) {
            list($layer, $depth) = explode(': ', $line);

            if ($layer % (($depth - 1) * 2) === 0) {
                $severity += $layer * $depth;
            }
        }

        return $severity;
    }

    public function getSafeDelay($input)
    {
        $layers = [];
        foreach (preg_split('/[\r\n]+/', trim($input)) as $line) {
            list($layer, $depth) = explode(': ', $line);
            $layers[$layer] = $depth;
        }

        for ($delay = 0; ; $delay++) {
            foreach ($layers as $layer => $depth) {
                if (($layer+$delay) % (($depth - 1) * 2) === 0) {
                    continue 2;
                }
            }

            return $delay;
        }
    }
}
