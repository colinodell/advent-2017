<?php

namespace spec\ColinODell\Advent;

use ColinODell\Advent\Day5Part1;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Day5Part1Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Day5Part1::class);
    }

    function it_should_pass_the_first_example()
    {
        $this->execute([0, 3, 0, 1 , -3])->shouldBe(5);
    }
}
