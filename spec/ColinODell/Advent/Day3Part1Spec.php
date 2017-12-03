<?php

namespace spec\ColinODell\Advent;

use ColinODell\Advent\Day3Part1;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Day3Part1Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Day3Part1::class);
    }

    function it_should_answer_0_for_1()
    {
        $this->getSteps(1)->shouldBe(0);
    }

    function it_should_answer_3_for_12()
    {
        $this->getSteps(12)->shouldBe(3);
    }

    function it_should_answer_2_for_23()
    {
        $this->getSteps(23)->shouldBe(2);
    }

    function it_should_answer_31_for_1024()
    {
        $this->getSteps(1024)->shouldBe(31);
    }
}
