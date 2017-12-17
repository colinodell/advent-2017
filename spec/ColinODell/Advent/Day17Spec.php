<?php

namespace spec\ColinODell\Advent;

use ColinODell\Advent\Day17;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Day17Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Day17::class);
    }

    function it_should_pass_the_first_example()
    {
        $this->step1(3)->shouldBe(638);
    }
    
    function it_should_pass_step1_with_my_custom_input()
    {
        $this->step1(370)->shouldBe(1244);
    }

    function it_should_pass_the_second_example()
    {
        $this->step2(3)->shouldBe(1226);
    }

    function it_should_pass_step2_with_my_custom_input()
    {
        $this->step2(370, 50000000)->shouldBe(11162912);
    }
}
