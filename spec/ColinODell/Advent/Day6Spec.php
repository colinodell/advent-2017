<?php

namespace spec\ColinODell\Advent;

use ColinODell\Advent\Day6;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Day6Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Day6::class);
    }

    function it_should_pass_the_first_example()
    {
        $this->set([0, 2, 7, 0]);
        $this->redistributeAll()->shouldBe(5);
    }
    
    function it_should_pass_step1_with_my_custom_input()
    {
        $this->set([2, 8, 8, 5, 4, 2, 3, 1, 5, 5, 1, 2, 15, 13, 5, 14]);
        $this->redistributeAll()->shouldBe(3156);
    }

    function it_should_pass_step2_with_my_custom_input()
    {
        $this->set([2, 8, 8, 5, 4, 2, 3, 1, 5, 5, 1, 2, 15, 13, 5, 14]);
        $this->redistributeAll();
        $this->redistributeAll()->shouldBe(1610);
    }
}
