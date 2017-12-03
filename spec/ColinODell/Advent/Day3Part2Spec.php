<?php

namespace spec\ColinODell\Advent;

use ColinODell\Advent\Day3Part2;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Day3Part2Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Day3Part2::class);
    }

    function it_should_answer_2_for_1()
    {
        $this->getFirstValueLargerThan(1)->shouldBe(2);
    }

    function it_should_answer_4_for_2()
    {
        $this->getFirstValueLargerThan(2)->shouldBe(4);
    }

    function it_should_answer_23_for_11()
    {
        $this->getFirstValueLargerThan(11)->shouldBe(23);
    }

    function it_should_answer_806_for_747()
    {
        $this->getFirstValueLargerThan(747)->shouldBe(806);
    }
}
