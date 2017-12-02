<?php

namespace spec\ColinODell\Advent;

use ColinODell\Advent\Day2Part2;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Day2Part2Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Day2Part2::class);
    }

    function it_should_solve_the_sample_problem()
    {
        $spreadsheet = <<<EOT
5 9 2 8
9 4 7 3
3 8 6 5
EOT;

        $this->calculateChecksum($spreadsheet)->shouldBe(9);
    }
}
