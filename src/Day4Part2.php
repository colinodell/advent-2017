<?php

namespace ColinODell\Advent;

class Day4Part2
{
    public function isValid($passphrase)
    {
        $words = explode(' ', $passphrase);
        $alreadyFound = [];
        foreach ($words as $word) {
            $permutations = $this->permutation($word);
            if (count(array_intersect($alreadyFound, $permutations)) > 0) {
                return false;
            }

            // array_merge is super slow, but whatevs
            $alreadyFound = array_merge($alreadyFound, $permutations);
        }

        return true;
    }

    /**
     * Adapted from https://stackoverflow.com/a/4240323/158766
     */
    private function permutation($word, $prefix = '')
    {
        $results = [];
        $n = strlen($word);
        if ($n === 0) {
            $results[] = $prefix;
        } else {
            for ($i = 0; $i < $n; $i++) {
                $results = array_merge($results, $this->permutation(substr($word, 0, $i) . substr($word, $i+1, $n), $prefix . $word[$i]));
            }
        }

        return $results;
    }
}
