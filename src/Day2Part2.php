<?php

namespace ColinODell\Advent;

class Day2Part2
{
    public function calculateChecksum($spreadsheet)
    {
        $checksum = 0;
        foreach (explode("\n", $spreadsheet) as $row) {
            $columns = preg_split('/[\t ]+/', $row);

            $count = count($columns);
            for ($i = 0; $i < $count; $i++) {
                for ($j = 0; $j < $count; $j++) {
                    // Don't compare a cell to itself; don't try dividing by zero either
                    if ($i === $j || $columns[$j] === 0) {
                        continue;
                    }

                    // Can we evenly divide these?
                    if ($columns[$i] % $columns[$j] === 0) {
                        $checksum += $columns[$i] / $columns[$j];
                        break 2;
                    }
                }
            }
        }

        return $checksum;
    }
}
