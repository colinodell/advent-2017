<?php

namespace ColinODell\Advent;

class Day16
{
    private $size;

    public function __construct($size = 16)
    {
        $this->size = $size;
    }

    public function run($moves, $iterations = 1)
    {
        $programs = array_map('chr', range(97, 97 + $this->size - 1));
        $moves = explode(',', trim($moves));

        $initialString = implode('', $programs);

        for ($i = 0; $i < $iterations; $i++) {
            foreach ($moves as $move) {
                $instruction = $move[0];
                $data = substr($move, 1);

                switch ($instruction) {
                    case 's':
                        $newStart = array_slice($programs, $this->size - $data);
                        $newEnd = array_slice(
                          $programs,
                          0,
                          $this->size - $data
                        );
                        $programs = array_merge($newStart, $newEnd);
                        break;
                    case 'x':
                        list($posA, $posB) = explode('/', $data);
                        $a = $programs[$posA];
                        $b = $programs[$posB];
                        $programs[$posA] = $b;
                        $programs[$posB] = $a;
                        break;
                    case 'p':
                        list($charA, $charB) = explode('/', $data);
                        $posA = array_search($charA, $programs);
                        $posB = array_search($charB, $programs);
                        $a = $programs[$posA];
                        $b = $programs[$posB];
                        $programs[$posA] = $b;
                        $programs[$posB] = $a;
                        break;
                }
            }

            $result = implode('', $programs);

            if ($result === $initialString) {
                // We've found a cycle!
                $i += (floor($iterations/($i+1))-1) * ($i+1);
            }
        }

        return $result;
    }
}
