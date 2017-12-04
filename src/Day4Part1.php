<?php

namespace ColinODell\Advent;

class Day4Part1
{
    public function isValid($passphrase)
    {
        return preg_match_all('/\b([a-z]+)\b.*\b\1\b/', $passphrase) === 0;
    }
}
