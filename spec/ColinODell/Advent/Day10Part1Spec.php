<?php

namespace spec\ColinODell\Advent;

use ColinODell\Advent\Day10Part1;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Day10Part1Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Day10Part1::class);
    }

    function it_should_pass_the_step1_example()
    {
        $this->beConstructedWith(5);
        $this->hash(3, 4, 1, 5)->shouldBe(12);
    }

    function it_should_pass_my_step1_input()
    {
        $this->hash(102,255,99,252,200,24,219,57,103,2,226,254,1,0,69,216)->shouldBe(5577);
    }

}
