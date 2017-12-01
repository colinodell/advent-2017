<?php

namespace spec\ColinODell\Advent;

use ColinODell\Advent\Day1Part2;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Day1Part2Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Day1Part2::class);
    }

    function it_should_give_6_for_1212()
    {
        $this->getAnswer('1212')->shouldBe(6);
    }

    function it_should_give_0_for_1221()
    {
        $this->getAnswer('1221')->shouldBe(0);
    }

    function it_should_give_4_for_123425()
    {
        $this->getAnswer('123425')->shouldBe(4);
    }

    function it_should_give_12_for_123123()
    {
        $this->getAnswer('123123')->shouldBe(12);
    }

    function it_should_give_4_for_12131415()
    {
        $this->getAnswer('12131415')->shouldBe(4);
    }
}
