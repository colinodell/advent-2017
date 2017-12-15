<?php

namespace ColinODell\Advent;

class Day9
{
    private $lastCancelledGarbageCount;

    public function score($str)
    {
        $pos = 0;
        $len = strlen($str);

        $level = 0;
        $score = 0;
        $parsingGarbage = false;
        $this->lastCancelledGarbageCount = 0;

        do {
            switch ($str[$pos]) {
                case '!':
                    $pos++;
                    break;
                case '<':
                    if ($parsingGarbage) {
                        $this->lastCancelledGarbageCount++;
                        break;
                    }

                    $parsingGarbage = true;
                    break;
                case '>':
                    $parsingGarbage = false;
                    break;
                case '{':
                    if ($parsingGarbage) {
                        $this->lastCancelledGarbageCount++;
                        break;
                    }

                    $level++;
                    $score += $level;
                    break;
                case '}':
                    if ($parsingGarbage) {
                        $this->lastCancelledGarbageCount++;
                        break;
                    }

                    $level--;
                    break;
                default:
                    if ($parsingGarbage) {
                        $this->lastCancelledGarbageCount++;
                    }
            }
        } while (++$pos < $len);

        return $score;
    }

    public function getLastCancelledGarbageCount()
    {
        return $this->lastCancelledGarbageCount;
    }
}
