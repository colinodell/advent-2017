<?php

namespace ColinODell\Advent;

class Day18
{
    public function run($program)
    {
        $alphabet = array_map('chr', range(97, 123));
        $registers = array_fill_keys($alphabet, 0);
        $lastSound = null;

        $program = array_map(function($l) { return explode(' ', $l); }, preg_split('/[\r\n]+/', trim($program)));

        $i = 0;
        while ($i >= 0 && $i < count($program)) {
            $c = $program[$i];
            switch ($c[0]) {
                case 'snd':
                   $lastSound = is_numeric($c[1]) ? $c[1] : $registers[$c[1]];
                   break;
                case 'set':
                    $registers[$c[1]] = is_numeric($c[2]) ? $c[2] : $registers[$c[2]];
                    break;
                case 'add':
                    $registers[$c[1]] += is_numeric($c[2]) ? $c[2] : $registers[$c[2]];
                    break;
                case 'mul':
                    $registers[$c[1]] *= is_numeric($c[2]) ? $c[2] : $registers[$c[2]];
                    break;
                case 'mod':
                    $registers[$c[1]] %= is_numeric($c[2]) ? $c[2] : $registers[$c[2]];
                    break;
                case 'rcv':
                    if ($registers[$c[1]] !== 0) {
                        return $lastSound;
                    }
                    break;
                case 'jgz':
                    if ($registers[$c[1]] > 0) {
                        $i += is_numeric($c[2]) ? $c[2] : $registers[$c[2]];
                        continue 2;
                    }
                    break;
            }
            $i++;
        }
    }
}
