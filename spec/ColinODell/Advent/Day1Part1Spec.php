<?php

namespace spec\ColinODell\Advent;

use ColinODell\Advent\Day1Part1;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Day1Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Day1Part1::class);
    }

    function it_should_give_3_for_1122()
    {
        $this->getAnswer('1122')->shouldBe(3);
    }

    function it_should_give_3_for_111()
    {
        $this->getAnswer('111')->shouldBe(3);
    }

    function it_should_give_4_for_1111()
    {
        $this->getAnswer('1111')->shouldBe(4);
    }

    function it_should_give_5_for_11111()
    {
        $this->getAnswer('11111')->shouldBe(5);
    }

    function it_should_give_0_for_1234()
    {
        $this->getAnswer('1234')->shouldBe(0);
    }

    function it_should_give_9_for_91212129()
    {
        $this->getAnswer('91212129')->shouldBe(9);
    }
}
