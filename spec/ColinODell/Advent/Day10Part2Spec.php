<?php

namespace spec\ColinODell\Advent;

use ColinODell\Advent\Day10Part2;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Day10Part2Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Day10Part2::class);
    }

    function it_should_pass_the_step2_examples()
    {
        $this->hash('')->shouldBe('a2582a3a0e66e6e86e3812dcb672a272');
        $this->hash('AoC 2017')->shouldBe('33efeb34ea91902bb2f59c9920caa6cd');
        $this->hash('1,2,3')->shouldBe('3efbe78a8d82f29979031a4aa0b16a9d');
        $this->hash('1,2,4')->shouldBe('63960835bcdc130f0b66d7ff4f6a5a8e');
    }

    function it_should_pass_my_step1_input()
    {
        $this->hash('102,255,99,252,200,24,219,57,103,2,226,254,1,0,69,216')->shouldBe('44f4befb0f303c0bafd085f97741d51d');
    }

}
