<?php

namespace ColinODell\Advent;

class Day2Part1
{
    public function calculateChecksum($spreadsheet)
    {
        $checksum = 0;
        foreach (explode("\n", $spreadsheet) as $row) {
            $columns = preg_split('/[\t ]+/', $row);
            $checksum += max($columns) - min($columns);
        }

        return $checksum;
    }
}
