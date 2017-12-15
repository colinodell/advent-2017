<?php

namespace spec\ColinODell\Advent;

use ColinODell\Advent\Day14;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Day14Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Day14::class);
    }

    function it_should_pass_the_first_part_example()
    {
        $this->run('flqrgnkx')->shouldBe(8108);
    }

    function it_should_pass_the_first_part_with_my_puzzle_input()
    {
        $this->run('hxtvlmkl')->shouldBe(8214);
    }
}
