<?php

namespace ColinODell\Advent;

class Day10Part2
{
    private $size;

    public function __construct(int $size = 256)
    {
        $this->size = $size;
    }

    public function hash($string)
    {
        $inputLengths = $this->toBytes($string);
        $inputLengths = array_merge($inputLengths, [17, 31, 73, 47, 23]);

        $pos = 0;
        $arr = range(0, $this->size-1);
        $skip = 0;

        $rounds = 64;

        while ($rounds--) {
            foreach ($inputLengths as $length) {
                $subslice = [];
                for ($i = 0; $i < $length; $i++) {
                    $subslice[] = $arr[($pos + $i) % $this->size];
                }
                $subslice = array_reverse($subslice);
                for ($i = 0; $i < $length; $i++) {
                    $arr[($pos + $i) % $this->size] = $subslice[$i];
                }

                $pos += $length + $skip++;
            }
        }

        $denseHash = '';
        foreach (array_chunk($arr, 16) as $chunk) {
            $xor = $chunk[0];
            for ($i = 1; $i < 16; $i++) {
                $xor ^= $chunk[$i];
            }
            $denseHash .= sprintf('%02s', dechex($xor));
        }

        return $denseHash;
    }

    private function toBytes($string)
    {
        $ret = [];
        if ($string !== '') {
            foreach (str_split($string) as $char) {
                $ret[] = ord($char);
            }
        }

        return $ret;
    }
}
