<?php

namespace spec\ColinODell\Advent;

use ColinODell\Advent\Day15;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Day15Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Day15::class);
    }

    function it_should_pass_the_first_part_example()
    {
        $this->run(65, 8921, 40000000)->shouldBe(588);
    }

    function it_should_pass_the_first_part_with_my_puzzle_input()
    {
        $this->run(699, 124, 40000000)->shouldBe(600);
    }

    function it_should_pass_the_second_part_example()
    {
        $this->run(65, 8921, 5000000, 4, 8)->shouldBe(309);
    }

    function it_should_pass_the_second_part_with_my_puzzle_input()
    {
        $this->run(699, 124, 5000000, 4, 8)->shouldBe(313);
    }
}
