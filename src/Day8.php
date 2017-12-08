<?php

namespace ColinODell\Advent;

class Day8
{
    public function run($instructions)
    {
        $lines = array_map([$this, 'parseLine'], preg_split('/[\r\n]+/', $instructions));

        $registers = [];
        $maxAllTime = 0;
        foreach ($lines as $line) {
            if ($this->evaluate($registers, $line['if'])) {
                $diff = ($line['do']['op'] === 'dec' ? -1 : 1) * $line['do']['offset'];
                $before = $registers[$line['do']['target']] ?? 0;
                $registers[$line['do']['target']] = $before + $diff;
            }
            $currentMax = empty($registers) ? 0 : max($registers);
            $maxAllTime = max($maxAllTime, $currentMax);
        }

        return [$currentMax, $maxAllTime];
    }

    private function evaluate(array $registers, array $if)
    {
        $value = $registers[$if['target']] ?? 0;

        switch ($if['comp']) {
            case '>':
                return $value > $if['value'];
            case '<':
                return $value < $if['value'];
            case '>=':
                return $value >= $if['value'];
            case '<=':
                return $value <= $if['value'];
            case '==':
                return $value == $if['value'];
            case '!=':
                return $value != $if['value'];
        }
    }

    private function parseLine($line)
    {
        preg_match('/(\w+) (inc|dec) (-?\d+) if (\w+) ([><=!]+) (-?\d+)/', $line, $matches);

        return [
            'do' => [
                'target' => $matches[1],
                'op' => $matches[2],
                'offset' => $matches[3],
            ],
            'if' => [
                'target' => $matches[4],
                'comp' => $matches[5],
                'value' => $matches[6],
            ],
        ];
    }
}
