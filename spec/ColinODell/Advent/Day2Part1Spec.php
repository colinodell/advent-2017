<?php

namespace spec\ColinODell\Advent;

use ColinODell\Advent\Day2Part1;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Day2Part1Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Day2Part1::class);
    }

    function it_should_solve_the_sample_problem()
    {
        $spreadsheet = <<<EOT
5 1 9 5
7 5 3
2 4 6 8
EOT;

        $this->calculateChecksum($spreadsheet)->shouldBe(18);
    }
}
