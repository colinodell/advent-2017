<?php

namespace ColinODell\Advent;

class Day6
{
    private $memory = [];

    public function set(array $memory = [])
    {
        $this->memory = $memory;
    }

    public function getAsString()
    {
        return implode('|', $this->memory);
    }

    public function redistributeOnce()
    {
        // Which bank has the highest value?
        $bank = array_search(max($this->memory), $this->memory);
        // Take those blocks out of memory
        $blocks = $this->memory[$bank];
        $this->memory[$bank] = 0;

        while ($blocks--) {
            // Move to the next bank
            if (!isset($this->memory[++$bank])) {
                $bank = 0;
            }

            // Add a block
            $this->memory[$bank]++;
        }
    }

    public function redistributeAll()
    {
        $seen = [];
        while (!in_array($this->getAsString(), $seen)) {
            $seen[] = $this->getAsString();
            $this->redistributeOnce();
        }

        return count($seen);
    }
}
