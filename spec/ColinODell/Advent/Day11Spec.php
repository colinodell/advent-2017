<?php

namespace spec\ColinODell\Advent;

use ColinODell\Advent\Day11;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Day11Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Day11::class);
    }

    function it_should_pass_the_first_example()
    {
        $moves = 'ne,ne,ne';
        $this->getShortestPathSize($moves)->shouldBe(3);
        $this->getFurthestDistanceEver($moves)->shouldBe(3);
    }

    function it_should_pass_the_second_example()
    {
        $moves = 'ne,ne,sw,sw';
        $this->getShortestPathSize($moves)->shouldBe(0);
        $this->getFurthestDistanceEver($moves)->shouldBe(2);
    }

    function it_should_pass_the_third_example()
    {
        $moves = 'ne,ne,s,s';
        $this->getShortestPathSize($moves)->shouldBe(2);
        $this->getFurthestDistanceEver($moves)->shouldBe(2);
    }

    function it_should_pass_the_fourth_example()
    {
        $moves = 'se,sw,se,sw,sw';
        $this->getShortestPathSize($moves)->shouldBe(3);
        $this->getFurthestDistanceEver($moves)->shouldBe(3);
    }

    function it_should_pass_the_actual_challenge()
    {
        $moves = <<<EOT
s,nw,s,nw,se,nw,nw,nw,nw,n,n,se,n,ne,n,ne,ne,n,se,ne,nw,ne,s,nw,ne,ne,sw,se,se,se,se,se,se,se,nw,se,se,sw,n,se,se,se,se,s,n,ne,se,nw,nw,nw,s,s,sw,se,se,s,s,s,se,s,s,n,sw,s,s,s,s,s,nw,s,se,sw,s,sw,s,s,s,ne,sw,sw,sw,s,sw,s,sw,sw,sw,s,sw,sw,sw,sw,se,sw,sw,sw,sw,ne,sw,ne,sw,sw,nw,sw,sw,ne,sw,se,sw,n,n,sw,sw,sw,nw,nw,s,nw,sw,nw,nw,sw,s,nw,sw,nw,nw,sw,sw,sw,nw,sw,sw,nw,nw,nw,sw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,sw,nw,nw,nw,se,nw,s,nw,nw,nw,nw,nw,nw,n,ne,n,se,nw,nw,nw,nw,nw,n,nw,ne,se,n,nw,nw,nw,nw,n,n,nw,ne,nw,ne,ne,n,nw,n,nw,n,ne,n,s,n,ne,se,nw,n,n,n,nw,n,n,sw,n,n,nw,n,se,n,nw,n,n,n,n,n,n,n,n,n,n,se,n,nw,n,n,n,n,se,sw,n,n,n,n,n,n,ne,n,s,n,nw,se,n,n,n,n,ne,ne,ne,n,se,n,ne,sw,n,ne,ne,n,se,s,n,n,ne,se,n,ne,ne,n,ne,n,s,ne,n,ne,ne,n,se,ne,s,n,nw,ne,nw,n,ne,ne,ne,ne,ne,ne,n,ne,ne,ne,ne,ne,ne,sw,ne,n,ne,se,sw,se,n,ne,ne,n,ne,ne,ne,s,ne,sw,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,sw,ne,ne,ne,ne,ne,ne,se,se,ne,nw,ne,ne,ne,ne,ne,ne,ne,ne,ne,se,se,ne,ne,se,ne,ne,ne,se,ne,ne,se,se,sw,s,ne,sw,ne,ne,sw,se,ne,ne,se,sw,ne,se,ne,ne,se,ne,ne,ne,ne,ne,se,ne,ne,se,ne,se,ne,se,se,se,s,ne,se,ne,ne,se,ne,se,nw,ne,ne,ne,se,ne,se,ne,se,se,n,se,se,se,ne,se,se,se,se,se,ne,se,ne,se,se,se,ne,se,ne,sw,se,ne,n,se,se,se,ne,se,se,ne,sw,se,se,n,se,ne,se,se,se,ne,se,se,s,se,se,se,se,se,se,se,se,se,se,se,ne,nw,se,se,se,se,se,se,se,se,se,se,se,se,se,ne,se,se,ne,se,se,se,s,se,se,ne,nw,se,s,se,se,n,se,n,se,se,se,se,nw,s,se,se,se,se,s,s,s,sw,se,se,s,se,se,se,s,s,s,n,s,se,se,se,s,se,se,nw,n,se,se,s,se,se,se,se,s,se,se,nw,nw,s,se,se,se,se,se,ne,s,s,se,se,se,s,se,s,se,se,s,se,se,se,sw,se,se,se,se,se,se,s,s,sw,s,s,s,s,s,s,s,sw,se,s,s,s,se,se,se,se,s,s,n,s,nw,se,s,s,se,se,s,s,se,s,s,s,ne,se,ne,nw,n,s,s,s,se,sw,s,s,s,se,s,s,s,s,s,s,s,s,s,ne,s,s,s,se,s,s,s,s,s,n,ne,sw,se,s,se,s,s,nw,s,sw,s,s,s,s,se,se,s,s,ne,s,s,s,s,se,s,s,se,ne,s,s,s,s,s,nw,s,s,se,s,sw,n,n,s,s,s,ne,s,s,s,s,s,s,s,s,s,sw,s,s,nw,sw,s,s,s,sw,s,s,s,sw,s,s,s,s,n,s,s,s,s,s,s,sw,nw,s,sw,sw,s,s,n,sw,s,s,s,s,se,sw,ne,ne,s,se,sw,s,sw,ne,n,sw,sw,sw,ne,s,s,sw,se,nw,s,s,s,se,nw,s,sw,nw,ne,sw,s,s,sw,sw,s,s,se,ne,s,s,sw,nw,sw,s,s,s,s,ne,s,sw,sw,s,sw,s,s,s,s,sw,sw,s,sw,s,s,s,sw,s,s,s,sw,sw,nw,sw,sw,ne,s,se,sw,sw,s,sw,sw,s,s,sw,s,s,s,n,s,s,sw,s,nw,sw,s,s,s,s,ne,ne,sw,s,sw,sw,sw,sw,s,sw,sw,se,ne,sw,s,sw,sw,s,s,sw,nw,sw,sw,s,nw,nw,s,sw,s,nw,sw,sw,n,sw,s,sw,sw,sw,s,sw,sw,sw,sw,ne,s,s,nw,sw,sw,sw,sw,sw,ne,s,sw,s,sw,ne,n,sw,sw,sw,s,sw,s,nw,sw,sw,sw,sw,sw,s,s,s,n,sw,sw,sw,se,s,ne,sw,s,s,sw,sw,sw,s,s,sw,sw,sw,sw,sw,sw,s,sw,sw,sw,ne,sw,s,s,sw,ne,sw,se,sw,sw,sw,ne,ne,sw,sw,ne,n,sw,ne,sw,sw,sw,sw,sw,sw,s,sw,sw,n,sw,nw,sw,sw,sw,sw,nw,sw,sw,sw,sw,sw,ne,sw,sw,sw,s,sw,sw,sw,sw,nw,sw,n,sw,sw,sw,sw,ne,ne,sw,sw,sw,sw,sw,sw,sw,sw,s,sw,se,sw,sw,sw,sw,sw,sw,sw,s,sw,sw,sw,sw,sw,sw,sw,sw,nw,sw,sw,sw,sw,sw,sw,sw,sw,se,sw,sw,nw,sw,sw,sw,sw,sw,nw,sw,sw,ne,sw,se,sw,sw,se,sw,nw,sw,nw,sw,nw,nw,nw,n,ne,nw,nw,sw,nw,ne,sw,sw,nw,sw,n,sw,s,sw,sw,sw,sw,sw,sw,sw,sw,nw,nw,sw,sw,sw,nw,sw,sw,sw,sw,sw,ne,sw,nw,sw,n,sw,s,n,sw,sw,sw,sw,sw,sw,nw,sw,sw,sw,sw,nw,sw,nw,nw,sw,sw,sw,s,sw,sw,s,sw,sw,nw,sw,ne,se,n,sw,sw,se,ne,sw,nw,nw,nw,sw,sw,sw,nw,sw,sw,nw,nw,nw,nw,s,sw,nw,sw,n,nw,s,sw,nw,n,sw,sw,sw,nw,nw,ne,nw,nw,sw,sw,sw,nw,nw,sw,nw,sw,sw,sw,nw,sw,s,nw,sw,nw,nw,sw,sw,nw,sw,s,nw,nw,ne,sw,sw,ne,sw,se,nw,sw,nw,sw,n,nw,sw,sw,nw,sw,sw,sw,sw,sw,nw,n,nw,nw,s,nw,nw,nw,sw,sw,n,nw,sw,nw,sw,se,sw,sw,s,nw,sw,se,nw,sw,nw,sw,ne,n,sw,ne,nw,sw,nw,sw,sw,nw,ne,nw,nw,nw,s,nw,sw,nw,se,sw,nw,s,sw,s,nw,n,nw,sw,se,nw,nw,nw,n,s,sw,nw,ne,n,sw,sw,nw,nw,sw,nw,nw,nw,nw,sw,sw,nw,ne,ne,sw,nw,n,nw,se,nw,nw,sw,nw,nw,nw,nw,nw,nw,s,nw,nw,sw,sw,nw,nw,sw,nw,nw,sw,sw,se,n,se,s,nw,nw,sw,nw,nw,nw,nw,nw,nw,nw,nw,nw,sw,s,sw,nw,nw,sw,sw,nw,nw,nw,nw,nw,nw,se,nw,n,sw,sw,nw,n,nw,nw,nw,ne,se,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,s,nw,nw,nw,s,nw,nw,nw,nw,nw,nw,ne,nw,nw,nw,nw,ne,nw,ne,nw,nw,nw,n,sw,nw,nw,sw,nw,nw,nw,s,nw,nw,s,nw,nw,nw,sw,nw,nw,s,s,nw,nw,nw,sw,sw,nw,n,nw,nw,nw,s,nw,nw,nw,nw,nw,nw,nw,nw,ne,nw,nw,n,nw,nw,nw,nw,nw,nw,nw,nw,s,n,nw,nw,nw,n,nw,nw,nw,nw,nw,nw,nw,n,nw,nw,nw,n,sw,se,nw,nw,ne,nw,sw,nw,ne,nw,n,nw,nw,n,ne,nw,nw,nw,nw,nw,nw,nw,se,nw,nw,nw,nw,nw,nw,nw,nw,ne,nw,nw,se,nw,nw,n,nw,n,nw,nw,nw,nw,n,n,nw,se,n,n,nw,n,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,n,s,n,n,sw,nw,nw,nw,se,nw,ne,nw,nw,nw,sw,nw,nw,sw,n,nw,nw,nw,n,nw,nw,n,n,nw,nw,n,n,n,nw,nw,nw,n,nw,sw,ne,sw,sw,se,n,se,n,n,nw,n,n,n,nw,nw,nw,nw,nw,n,n,n,se,nw,n,n,sw,nw,nw,nw,nw,n,nw,s,nw,n,nw,nw,n,nw,nw,n,nw,nw,nw,n,nw,nw,s,nw,nw,nw,nw,nw,nw,n,nw,n,se,n,n,nw,nw,nw,nw,ne,n,se,sw,nw,n,n,nw,nw,n,nw,sw,sw,n,n,nw,se,nw,n,nw,nw,ne,nw,n,nw,nw,nw,n,n,nw,n,nw,nw,n,s,n,n,nw,n,n,n,nw,n,sw,n,se,sw,nw,n,n,sw,n,nw,nw,n,sw,sw,n,n,s,n,n,n,n,n,n,sw,nw,nw,n,sw,n,nw,nw,se,n,nw,ne,n,n,n,n,n,nw,sw,nw,nw,s,ne,se,nw,n,se,sw,nw,n,n,n,nw,n,nw,nw,n,n,n,nw,s,s,n,sw,n,nw,n,ne,nw,n,nw,nw,nw,sw,n,nw,n,n,sw,n,n,nw,n,n,se,n,nw,nw,nw,ne,nw,n,nw,n,nw,n,n,nw,nw,nw,n,nw,s,nw,n,s,nw,nw,n,nw,n,nw,n,n,sw,nw,n,nw,nw,n,sw,nw,n,nw,n,se,n,n,n,nw,n,nw,nw,se,nw,nw,nw,nw,n,nw,n,n,n,nw,n,n,nw,n,n,nw,n,n,n,n,n,nw,sw,n,nw,n,n,n,n,nw,n,nw,ne,nw,n,n,n,n,n,n,se,n,n,nw,n,n,n,n,s,nw,n,n,ne,n,n,se,n,n,nw,n,sw,n,s,n,nw,n,n,nw,nw,n,n,n,n,ne,n,n,se,ne,nw,n,n,nw,n,s,nw,nw,nw,n,sw,n,s,n,n,n,n,n,n,sw,n,ne,n,n,ne,n,n,n,se,sw,n,n,n,nw,n,n,n,nw,n,n,n,n,se,n,n,n,n,sw,ne,ne,n,n,n,ne,s,ne,n,n,n,nw,n,n,n,nw,n,n,n,n,n,nw,sw,nw,n,n,n,s,ne,n,n,ne,nw,n,n,n,n,n,n,nw,n,n,n,n,n,n,sw,n,nw,n,se,n,n,n,n,se,n,n,se,n,s,n,nw,n,se,n,n,sw,n,n,n,n,n,n,ne,n,sw,ne,n,n,n,n,n,n,n,n,n,n,ne,n,n,sw,sw,n,n,n,n,n,n,n,n,se,n,n,n,se,n,n,n,n,n,ne,se,n,n,n,n,n,n,n,n,n,n,ne,n,n,n,n,ne,n,n,ne,nw,se,n,n,n,n,n,n,n,n,n,ne,s,n,n,n,n,nw,n,n,n,ne,n,se,ne,ne,n,n,ne,n,sw,n,n,ne,n,n,se,ne,n,n,n,n,n,s,s,ne,nw,n,nw,ne,n,ne,nw,ne,ne,n,n,sw,n,n,ne,s,ne,n,sw,ne,n,se,nw,n,n,n,n,sw,s,se,ne,n,n,n,n,n,ne,sw,sw,s,n,nw,ne,n,n,ne,ne,ne,se,n,n,sw,n,se,n,n,se,ne,n,n,ne,nw,ne,n,sw,n,n,n,ne,ne,ne,ne,n,n,n,n,n,sw,n,n,n,nw,n,n,s,n,ne,ne,n,n,sw,sw,ne,n,n,n,n,ne,ne,ne,ne,nw,ne,se,ne,n,n,n,se,n,n,ne,n,sw,nw,n,n,s,n,n,n,n,n,n,n,n,sw,nw,n,n,n,n,n,n,n,n,ne,n,ne,n,ne,n,n,n,ne,ne,n,n,ne,n,n,n,n,ne,sw,n,se,n,n,n,n,ne,n,s,n,n,ne,ne,ne,n,n,ne,ne,n,ne,n,ne,se,n,se,sw,sw,sw,se,nw,ne,nw,ne,ne,n,ne,n,ne,n,ne,ne,ne,ne,n,n,n,ne,ne,n,ne,nw,sw,ne,n,ne,n,n,ne,nw,n,n,n,ne,se,n,n,n,ne,ne,n,n,nw,ne,n,n,s,n,ne,s,s,ne,nw,n,ne,n,n,nw,ne,ne,ne,n,n,ne,s,ne,sw,n,n,n,n,ne,ne,ne,ne,ne,n,sw,n,nw,ne,ne,ne,n,se,ne,s,ne,ne,ne,s,ne,n,n,ne,n,s,ne,n,ne,n,n,ne,n,ne,ne,ne,n,ne,n,nw,ne,ne,ne,ne,ne,ne,nw,ne,ne,ne,ne,n,sw,sw,ne,n,se,s,ne,n,n,nw,ne,ne,sw,ne,n,se,ne,n,sw,ne,n,ne,ne,ne,ne,ne,ne,ne,ne,n,n,n,ne,ne,nw,n,ne,ne,n,ne,n,sw,ne,n,n,ne,ne,n,s,nw,n,se,ne,n,se,ne,ne,ne,sw,n,ne,ne,sw,ne,n,n,ne,n,nw,n,ne,ne,n,ne,ne,ne,ne,se,se,nw,n,ne,ne,n,ne,ne,n,ne,sw,ne,se,n,ne,ne,ne,ne,ne,ne,ne,n,nw,ne,se,ne,n,ne,ne,ne,ne,ne,ne,ne,n,n,n,nw,ne,n,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,nw,ne,s,n,ne,ne,ne,sw,sw,ne,sw,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,se,ne,ne,ne,ne,sw,ne,n,ne,ne,n,ne,ne,ne,nw,n,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,s,n,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,sw,ne,ne,ne,ne,n,nw,ne,ne,ne,ne,se,ne,ne,ne,ne,sw,ne,ne,nw,ne,n,ne,ne,ne,ne,sw,ne,ne,sw,ne,ne,ne,ne,ne,se,ne,n,ne,nw,ne,sw,ne,ne,sw,ne,ne,n,ne,ne,ne,nw,n,ne,ne,n,ne,nw,n,ne,ne,ne,s,s,ne,ne,n,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,sw,nw,ne,ne,ne,ne,ne,nw,ne,sw,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,n,n,ne,sw,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,sw,ne,ne,se,n,ne,ne,ne,ne,s,ne,sw,ne,ne,ne,ne,se,ne,ne,sw,ne,ne,s,n,ne,ne,ne,ne,n,ne,se,ne,ne,nw,s,ne,ne,ne,ne,ne,ne,ne,ne,ne,nw,ne,ne,s,ne,ne,ne,se,ne,ne,ne,ne,s,ne,se,ne,ne,ne,se,ne,nw,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,ne,nw,ne,ne,se,se,ne,nw,ne,ne,ne,n,ne,ne,ne,s,ne,ne,ne,ne,ne,nw,n,ne,s,ne,se,s,ne,ne,ne,ne,se,ne,ne,ne,nw,ne,se,ne,ne,ne,ne,ne,ne,ne,nw,ne,se,ne,ne,ne,se,ne,se,ne,ne,ne,ne,ne,ne,se,ne,ne,ne,ne,n,ne,ne,ne,ne,ne,ne,ne,ne,sw,ne,ne,ne,s,ne,ne,ne,ne,ne,ne,ne,ne,ne,n,sw,ne,nw,ne,nw,ne,sw,ne,ne,ne,ne,ne,ne,ne,s,ne,ne,n,ne,n,sw,ne,ne,ne,se,ne,se,se,ne,ne,n,n,ne,nw,ne,s,ne,ne,ne,ne,ne,ne,se,sw,ne,se,se,s,nw,se,ne,ne,s,n,ne,ne,ne,ne,se,se,ne,ne,ne,nw,sw,ne,ne,ne,ne,ne,se,ne,ne,se,se,se,se,se,se,ne,ne,se,ne,sw,ne,ne,ne,se,ne,ne,ne,ne,se,ne,se,ne,se,ne,sw,ne,ne,ne,se,ne,ne,ne,ne,ne,s,ne,ne,ne,ne,s,se,sw,ne,ne,s,ne,se,ne,se,ne,se,se,ne,ne,ne,ne,ne,ne,ne,ne,se,se,ne,ne,se,s,se,ne,ne,ne,ne,se,ne,se,se,nw,ne,se,ne,n,n,ne,ne,s,ne,n,nw,ne,nw,ne,ne,ne,s,s,ne,sw,ne,sw,se,se,se,ne,ne,sw,se,ne,ne,se,ne,se,ne,se,ne,se,ne,s,se,ne,ne,ne,se,ne,ne,se,ne,n,se,se,se,ne,nw,se,se,se,se,se,ne,n,ne,nw,ne,se,se,ne,ne,ne,ne,se,se,ne,ne,ne,ne,ne,se,se,ne,sw,s,se,nw,se,ne,se,n,ne,se,sw,ne,ne,ne,ne,ne,ne,n,ne,se,n,se,ne,ne,ne,n,ne,se,ne,se,ne,ne,se,n,ne,sw,s,se,se,se,sw,ne,se,ne,ne,se,se,nw,se,ne,se,ne,ne,se,se,nw,ne,nw,ne,ne,ne,n,se,ne,n,ne,sw,ne,ne,ne,sw,ne,se,se,se,ne,sw,ne,ne,sw,ne,ne,ne,ne,ne,se,se,ne,ne,ne,ne,ne,n,se,ne,ne,s,ne,ne,se,ne,nw,ne,s,nw,nw,se,se,ne,ne,n,ne,ne,nw,ne,ne,ne,se,ne,sw,s,ne,ne,ne,n,ne,ne,se,se,se,ne,sw,ne,se,ne,sw,se,se,se,ne,ne,ne,ne,ne,se,s,se,sw,se,ne,se,se,ne,se,ne,se,ne,se,ne,se,ne,ne,ne,s,se,se,n,se,se,ne,se,ne,n,s,se,se,se,se,se,nw,ne,ne,se,se,se,se,ne,se,ne,ne,se,se,se,ne,se,se,se,ne,se,ne,ne,se,ne,nw,ne,se,ne,se,ne,ne,se,se,ne,ne,ne,ne,se,ne,ne,se,n,ne,se,sw,ne,ne,ne,se,ne,sw,se,ne,se,ne,se,ne,se,se,ne,ne,nw,sw,se,ne,se,ne,se,ne,se,ne,ne,ne,se,ne,ne,se,n,se,se,se,nw,se,se,se,se,se,ne,se,ne,se,sw,sw,se,se,n,ne,ne,s,se,ne,ne,ne,se,ne,se,ne,se,se,ne,ne,se,se,se,se,ne,se,ne,ne,ne,se,ne,se,ne,ne,se,ne,ne,se,se,se,s,se,se,ne,ne,ne,nw,se,se,ne,nw,sw,ne,se,se,s,se,ne,ne,nw,se,se,n,se,se,se,se,s,se,se,se,ne,se,ne,se,se,se,ne,ne,ne,se,se,nw,se,ne,se,se,se,ne,ne,se,se,ne,ne,n,se,ne,se,ne,se,ne,ne,se,se,se,se,se,se,ne,se,ne,sw,ne,se,n,se,se,s,se,se,ne,ne,se,se,se,se,nw,se,se,se,s,sw,se,se,se,ne,se,ne,se,se,ne,ne,se,ne,ne,ne,se,sw,se,n,se,se,se,se,ne,nw,ne,se,se,s,se,se,ne,s,se,ne,s,se,se,ne,sw,sw,se,se,se,se,se,se,s,se,ne,ne,se,sw,ne,se,se,se,se,ne,se,se,se,se,ne,se,ne,se,se,se,se,ne,ne,ne,ne,ne,ne,n,se,ne,se,se,se,se,ne,nw,se,se,ne,se,n,sw,se,se,se,se,ne,se,se,se,s,se,ne,sw,se,se,se,se,n,se,ne,ne,se,se,se,se,se,se,se,nw,se,ne,ne,se,ne,se,se,se,se,se,ne,se,s,se,sw,se,ne,se,se,ne,n,se,se,se,nw,nw,se,se,se,nw,se,se,s,ne,sw,se,se,ne,se,ne,se,ne,ne,sw,se,ne,nw,se,se,se,se,ne,ne,se,n,se,sw,se,se,nw,se,se,se,se,se,se,se,ne,ne,se,se,se,nw,se,se,se,n,s,n,se,ne,se,s,ne,s,se,se,se,se,ne,se,se,se,se,se,se,se,se,se,se,se,ne,nw,sw,se,ne,se,se,n,se,se,nw,se,se,ne,se,se,s,ne,se,ne,se,se,se,se,se,s,se,nw,se,se,se,se,n,se,ne,se,nw,se,se,se,se,se,s,se,se,se,n,ne,se,se,se,ne,ne,se,se,ne,sw,se,sw,n,se,sw,se,se,se,se,se,se,se,se,ne,se,se,se,se,se,ne,se,s,se,se,se,se,n,se,se,se,se,se,se,se,se,se,se,sw,se,se,sw,se,se,sw,se,se,sw,se,nw,se,se,se,se,se,se,se,se,se,n,se,ne,se,se,se,se,se,se,se,se,se,se,se,se,se,s,nw,ne,se,se,s,se,se,s,se,se,se,se,se,se,se,sw,se,se,se,se,se,se,se,se,se,se,se,se,se,se,se,s,se,se,se,se,se,sw,se,se,ne,s,se,se,se,se,se,se,sw,se,se,se,se,ne,se,se,s,se,se,n,se,se,se,ne,se,s,se,se,s,n,se,s,se,se,sw,se,se,se,se,se,se,se,sw,sw,se,se,se,se,se,se,s,se,se,nw,se,se,se,se,se,se,se,se,se,se,s,se,se,se,se,se,se,se,sw,se,se,se,n,se,se,se,se,s,s,se,se,se,se,n,s,se,n,se,se,se,se,se,nw,se,se,se,sw,se,se,se,s,s,s,se,se,se,se,nw,s,n,se,se,se,se,ne,se,se,sw,se,se,s,se,ne,ne,se,sw,s,s,se,se,s,nw,se,se,se,se,se,nw,se,se,se,se,s,s,se,s,n,se,se,se,se,se,se,s,se,s,se,nw,se,se,se,sw,se,s,s,se,s,se,se,se,se,se,se,se,nw,se,se,nw,se,se,se,se,se,s,se,se,s,se,se,s,s,se,se,se,se,s,se,sw,s,se,se,s,se,ne,se,se,s,se,se,ne,se,se,s,se,se,s,se,s,se,se,se,se,se,s,s,s,se,se,se,se,s,s,ne,n,se,se,s,sw,se,sw,se,sw,se,se,se,se,s,se,s,s,se,se,se,se,ne,se,se,s,s,se,se,se,se,se,n,ne,ne,se,se,s,se,se,se,se,se,s,se,se,se,se,sw,se,se,se,sw,s,se,se,se,ne,se,se,se,se,se,se,se,s,ne,se,se,se,se,sw,s,s,se,se,se,se,se,n,n,se,se,ne,se,se,sw,s,se,se,nw,ne,s,se,se,se,n,n,se,s,ne,se,se,se,se,se,se,se,se,se,se,se,se,se,s,nw,se,se,s,se,se,sw,se,se,s,sw,sw,se,se,s,sw,se,s,s,s,s,se,se,nw,se,n,se,n,se,s,se,s,ne,n,se,n,se,se,se,ne,s,se,se,ne,se,se,sw,se,s,nw,se,se,s,s,se,s,sw,sw,n,se,se,s,n,se,se,se,s,se,se,s,nw,nw,se,se,se,se,se,se,s,se,se,se,se,s,nw,s,sw,se,sw,s,ne,nw,se,se,s,se,se,se,se,se,se,se,se,se,se,se,se,s,s,se,se,se,ne,se,ne,se,ne,se,se,se,se,se,se,s,se,s,n,se,se,n,s,s,s,nw,se,ne,se,se,s,se,se,sw,s,s,s,se,s,s,n,sw,s,se,se,se,s,ne,se,s,n,se,se,se,se,ne,se,nw,s,s,s,nw,se,n,s,n,se,se,se,s,se,s,se,nw,s,n,se,s,ne,s,se,s,se,s,s,sw,se,s,s,se,se,s,se,n,se,n,se,se,se,s,se,se,nw,se,se,n,se,se,ne,se,se,s,s,se,se,se,se,n,se,se,se,ne,nw,se,se,se,se,se,se,se,se,sw,s,se,s,se,s,s,sw,se,se,se,s,se,se,se,se,ne,s,s,se,se,s,se,se,se,se,sw,s,se,se,ne,nw,sw,se,s,se,s,se,n,s,sw,se,se,nw,nw,s,ne,s,se,se,s,sw,se,se,s,s,s,s,se,s,se,n,s,se,s,se,s,se,s,se,se,se,s,se,se,s,s,s,s,ne,se,se,se,ne,ne,s,sw,nw,se,se,s,s,se,s,nw,se,ne,se,se,s,sw,ne,se,se,s,sw,se,s,s,s,sw,s,se,se,ne,ne,se,sw,s,s,s,s,s,se,se,s,s,se,nw,se,s,s,s,se,s,s,se,sw,s,s,s,ne,se,se,s,se,s,se,s,se,nw,nw,s,se,s,ne,se,n,se,se,s,se,se,nw,s,s,se,s,s,se,n,se,se,s,se,se,se,se,s,se,se,se,s,s,se,s,se,ne,s,n,sw,n,sw,s,s,s,se,s,s,s,s,n,se,se,se,s,s,se,se,se,se,sw,s,s,s,se,ne,se,se,s,ne,s,s,se,sw,se,se,s,se,se,se,se,s,s,ne,s,s,s,se,s,se,s,ne,se,s,sw,nw,se,s,s,s,s,s,s,se,n,s,s,se,se,sw,se,s,se,s,se,se,se,s,sw,s,s,sw,se,se,se,se,s,se,sw,s,n,ne,se,s,s,se,n,s,sw,nw,se,s,nw,se,se,se,se,s,ne,s,sw,s,nw,s,se,se,s,se,ne,se,se,se,se,s,se,s,sw,s,n,ne,se,s,s,s,s,s,s,se,s,se,s,se,s,s,s,s,s,s,s,s,se,se,se,nw,se,se,s,s,s,s,se,s,s,nw,s,se,se,s,se,se,ne,sw,se,s,s,se,sw,s,s,se,se,se,s,se,n,sw,s,se,s,se,se,se,se,se,se,se,se,se,se,se,s,s,n,s,s,se,s,se,se,s,s,nw,se,s,se,s,se,s,s,s,ne,s,se,s,s,nw,s,se,se,se,s,n,s,se,s,s,s,s,se,s,nw,se,se,se,se,nw,nw,ne,s,se,se,s,sw,sw,se,se,s,s,s,se,s,s,s,se,se,s,se,se,ne,n,nw,s,s,s,se,se,nw,s,s,s,s,s,s,s,s,se,ne,se,s,s,se,se,s,s,s,s,ne,ne,s,sw,s,se,n,s,nw,nw,se,se,s,se,s,s,nw,s,ne,nw,se,s,s,se,se,se,s,se,s,sw,se,n,se,s,s,s,nw,se,sw,s,s,s,ne,s,s,s,s,s,s,sw,se,se,s,nw,s,se,se,s,s,s,s,s,s,s,se,nw,s,se,s,ne,s,se,s,s,n,s,s,s,se,s,s,s,s,s,se,s,s,sw,s,sw,s,n,s,nw,ne,se,s,ne,s,s,se,n,s,ne,se,s,se,s,s,s,sw,sw,s,s,s,s,sw,s,sw,se,s,n,n,s,s,se,s,se,s,ne,s,se,s,s,s,nw,s,s,se,nw,s,s,s,s,s,s,s,s,s,nw,ne,n,s,n,s,s,se,s,s,se,se,s,s,s,s,s,ne,s,s,s,n,se,ne,ne,s,s,s,s,s,s,s,s,s,s,s,s,s,s,s,s,se,s,s,n,s,s,s,nw,se,ne,s,s,s,s,s,se,s,s,s,sw,s,s,s,s,s,s,s,s,se,s,n,ne,s,s,s,nw,n,s,s,s,s,sw,se,nw,s,se,n,s,s,sw,s,s,s,sw,s,s,s,se,s,s,s,s,n,s,s,s,s,s,se,sw,s,s,s,s,nw,s,s,s,nw,s,nw,s,s,se,s,s,se,s,sw,s,s,s,s,s,se,s,s,n,s,nw,s,s,s,ne,se,se,s,ne,s,sw,s,se,s,s,s,s,s,se,s,nw,nw,se,nw,s,s,s,nw,se,s,s,s,se,s,s,s,ne,se,s,s,s,n,s,s,s,se,s,s,s,s,sw,sw,s,nw,ne,s,s,n,s,s,s,se,ne,s,s,nw,s,s,s,s,s,n,nw,s,s,s,se,s,nw,s,ne,s,s,s,sw,s,s,n,s,s,s,s,s,s,s,n,nw,ne,se,sw,s,nw,n,s,s,s,se,s,s,s,s,s,s,sw,s,s,ne,s,n,nw,s,nw,ne,s,s,s,s,s,s,s,sw,s,s,s,s,s,s,s,sw,s,s,s,s,s,se,s,s,s,s,s,n,s,s,s,s,n,s,s,s,se,ne,nw,ne,ne,n,nw,n,n,nw,nw,nw,nw,sw,s,sw,ne,sw,nw,sw,s,sw,sw,sw,se,sw,sw,sw,sw,s,s,nw,sw,n,s,n,s,s,s,s,n,s,se,se,s,se,se,se,s,se,se,s,s,se,s,ne,n,se,nw,se,se,se,se,ne,se,se,se,n,se,se,sw,se,se,se,ne,se,ne,ne,n,se,s,se,ne,ne,ne,se,ne,s,ne,ne,ne,ne,ne,se,ne,ne,ne,ne,se,n,n,ne,s,s,ne,n,n,ne,ne,se,s,sw,ne,n,s,n,ne,ne,n,s,ne,ne,n,n,nw,n,n,n,s,ne,ne,n,ne,n,ne,n,n,n,ne,ne,nw,n,sw,n,n,nw,n,n,n,n,n,n,n,n,n,sw,n,n,n,n,n,n,n,nw,se,n,nw,n,n,n,n,se,nw,n,nw,n,n,nw,n,nw,n,nw,se,n,n,n,n,s,n,se,se,n,nw,nw,nw,n,n,nw,nw,s,n,nw,nw,nw,nw,nw,nw,nw,nw,nw,sw,n,nw,nw,nw,sw,nw,nw,nw,nw,nw,nw,nw,nw,nw,ne,nw,nw,nw,sw,nw,ne,ne,se,nw,nw,nw,nw,nw,sw,nw,sw,nw,sw,s,nw,nw,nw,nw,nw,nw,nw,nw,sw,sw,nw,nw,sw,nw,sw,n,nw,sw,nw,sw,nw,se,nw,se,s,s,nw,nw,nw,nw,s,sw,n,nw,n,nw,sw,nw,nw,n,sw,s,nw,sw,sw,nw,sw,sw,sw,ne,sw,n,s,sw,sw,sw,sw,sw,n,sw,sw,s,sw,sw,sw,ne,sw,sw,nw,sw,n,s,sw,sw,sw,sw,sw,s,sw,sw,sw,sw,sw,sw,sw,sw,sw,ne,sw,nw,sw,ne,sw,sw,n,sw,sw,sw,ne,sw,nw,sw,s,ne,sw,sw,sw,sw,s,sw,sw,se,sw,sw,sw,sw,s,sw,sw,s,ne,s,sw,s,sw,sw,s,n,s,se,sw,sw,se,se,nw,s,s,sw,sw,n,s,s,s,sw,s,se,sw,sw,se,sw,sw,sw,nw,n,s,sw,sw,s,sw,s,sw,s,s,sw,s,sw,s,sw,s,se,s,sw,sw,sw,sw,sw,s,s,sw,s,s,s,ne,s,s,ne,sw,sw,nw,s,s,se,sw,sw,s,s,s,n,s,s,s,ne,s,s,s,s,n,nw,s,s,s,s,s,s,s,s,sw,s,s,s,s,s,s,s,s,s,s,se,s,se,s,s,s,s,s,s,s,s,s,nw,s,s,nw,s,s,s,s,s,ne,n,s,s,s,s,n,s,s,n,s,s,s,s,se,s,se,s,se,sw,se,s,s,se,s,s,se,s,s,s,s,se,nw,ne,n,se,s,s,s,s,s,sw,n,s,s,s,se,se,s,se,se,sw,se,ne,s,se,sw,se,nw,se,se,s,s,s,se,s,s,s,se,se,s,sw,se,s,n,s,s,se,n,se,se,s,se,s,ne,s,s,s,se,s,se,s,ne,s,se,se,nw,ne,se,se,se,s,s,s,se,s,nw,s,se,s,se,se,n,se,s,se,nw,se,se,se,se,se,se,se,s,se,s,nw,n,se,ne,se,s,se,se,ne,n,se,ne,se,se,se,s,se,ne,se,s,se,se,se,sw,s,s,se,se,s,se,nw,se,se,se,se,se,se,se,se,se,se,se,se,se,ne,se,se,s,se,se,se,s,se,se,se,se,se,se,se,se,se,se,se,s,se,sw,se,se,se,ne,se,se,se,se,se,se,ne,se,nw,se,se,se,se,ne,sw,sw,se,se,se,ne,n,se,ne,nw,se,sw,se,se,se,ne,ne,se,ne,se,se,se,sw,se,se,n,se,se,n,se,se,se,ne,se,se,sw,se,nw,s,se,se,n,ne,se,ne,ne,se,se,se,ne,ne,nw,se,se,s,sw,se,ne,se,ne,sw,s,se,ne,se,se,se,se,nw,se,se,se,se,se,se,se,se,ne,ne,ne,se,se,ne,se,n,se,se,ne,n,sw,se,ne,se,se,se,se,ne,se,sw,ne,ne,ne,ne,se,se,se,ne,se,se,se,ne,n,ne,se,se,ne,ne,ne,se,se,se,se,sw,nw,ne,ne,s,sw,ne,se,sw,se,sw,ne,nw,ne,ne,ne,ne,ne,se,ne,ne,ne,se,se,ne,ne,ne,s,se,ne,nw,se,se,ne,ne,ne,se,sw,ne,nw,sw,ne,ne,n,n,ne,ne,se,ne,nw,sw,se,ne,se,ne,se,se,ne,se,se,sw,ne,nw,s,ne,se,se,ne,sw,ne,ne,nw,s,ne,ne,ne,ne,ne,se,ne,nw,ne,ne,ne,se,ne,ne,ne,ne,sw,ne,ne,ne,ne,ne,ne,ne,ne,nw,ne,ne,se,se,ne,ne,ne,ne,se,ne,se,n,ne,ne,ne,s,se,sw,ne,ne,ne,ne,ne,ne,ne,ne,se,ne,sw,ne,ne,ne,ne,ne,ne,ne,n,n,ne,n,ne,ne,nw,ne,ne,ne,ne,se,ne,ne,ne,ne,ne,ne,ne,ne,se,ne,sw,ne,ne,ne,ne,ne,ne,ne,ne,ne,n,sw,ne,ne,ne,ne,ne,ne,sw,ne,ne,ne,s,ne,ne,ne,sw,ne,ne,n,ne,ne,ne,ne,ne,ne,ne,ne,s,n,ne,se,sw,ne,se,ne,ne,ne,ne,n,ne,ne,ne,se,n,nw,ne,ne,ne,sw,ne,n,nw,s,ne,ne,nw,s,ne,se,ne,ne,nw,n,ne,se,nw,ne,n,ne,ne,ne,ne,n,ne,ne,n,ne,n,ne,ne,n,ne,ne,n,n,ne,ne,ne,nw,ne,ne,ne,se,ne,ne,ne,n,ne,nw,ne,ne,ne,ne,n,n,ne,ne,ne,ne,sw,nw,ne,ne,n,ne,sw,n,ne,ne,ne,ne,ne,n,ne,n,n,n,s,n,ne,se,ne,n,ne,ne,s,s,ne,n,ne,n,nw,n,nw,ne,sw,s,ne,ne,ne,ne,ne,ne,n,ne,nw,s,ne,n,ne,se,ne,ne,n,ne,n,s,se,sw,ne,sw,n,ne,ne,sw,n,ne,n,n,sw,n,n,n,ne,n,sw,n,ne,ne,sw,sw,n,ne,n,ne,n,n,sw,n,n,ne,n,ne,n,ne,nw,ne,n,ne,n,n,ne,n,n,n,ne,n,ne,sw,n,n,se,n,n,ne,ne,s,n,ne,n,ne,ne,ne,ne,n,ne,s,n,ne,n,nw,n,n,ne,n,ne,n,nw,n,n,ne,ne,n,n,n,ne,n,n,n,se,n,n,ne,n,n,n,n,n,n,n,n,n,n,n,s,n,ne,ne,n,n,n,n,n,ne,n,nw,nw,n,n,sw,ne,nw,ne,n,n,ne,n,s,n,ne,ne,n,sw,ne,n,ne,n,n,n,se,n,n,ne,n,n,n,ne,n,n,n,n,n,ne,nw,n,n,s,n,n,n,ne,n,se,n,n,s,n,n,ne,se,n,n,ne,n,ne,n,n,n,ne,se,n,n,sw,sw,n,s,n,se,n,n,n,n,sw,n,n,ne,n,n,n,n,n,n,n,n,n,n,n,n,n,nw,n,n,n,n,n,se,n,s,n,se,n,n,n,n,n,sw,n,ne,n,n,s,n,n,n,nw,n,n,n,n,nw,nw,n,n,n,n,n,s,n,n,ne,n,n,n,n,nw,sw,n,n,n,s,n,nw,s,n,s,n,n,n,n,n,n,n,n,n,n,n,n,n,se,nw,n,n,n,n,nw,n,sw,s,nw,n,n,n,n,n,n,se,n,n,n,n,n,n,ne,nw,n,n,n,n,n,se,n,n,n,n,n,n,n,n,n,n,n,n,sw,n,n,nw,se,se,nw,ne,n,n,n,nw,n,n,n,n,n,n,nw,n,nw,nw,s,nw,n,n,n,n,nw,nw,nw,nw,ne,n,nw,n,nw,n,ne,s,nw,se,n,nw,nw,nw,sw,n,n,se,nw,nw,nw,n,n,nw,nw,n,n,n,nw,nw,n,nw,sw,n,n,n,n,n,nw,n,nw,n,nw,s,n,nw,ne,nw,se,n,se,n,nw,n,n,s,n,s,n,n,nw,nw,ne,nw,n,sw,ne,nw,ne,nw,n,nw,nw,nw,se,nw,n,n,nw,se,nw,nw,n,se,n,n,n,n,n,nw,n,ne,n,n,n,sw,nw,nw,nw,nw,nw,n,n,n,s,nw,se,nw,nw,n,n,s,nw,n,ne,nw,n,se,n,nw,n,nw,nw,nw,n,n,nw,nw,nw,nw,n,nw,n,nw,nw,s,n,nw,n,nw,s,nw,n,sw,ne,nw,se,nw,nw,ne,n,n,n,se,nw,n,nw,nw,nw,nw,ne,nw,s,nw,nw,nw,nw,n,n,nw,se,nw,n,nw,ne,nw,sw,n,se,n,nw,sw,nw,nw,n,s,nw,nw,s,ne,nw,n,n,n,nw,n,n,nw,n,nw,n,nw,n,n,sw,nw,n,nw,n,nw,n,se,ne,nw,nw,n,sw,nw,n,nw,nw,nw,ne,nw,n,nw,nw,nw,nw,nw,nw,n,n,n,nw,ne,nw,n,n,s,nw,nw,ne,nw,nw,nw,nw,nw,nw,se,nw,n,nw,nw,nw,nw,nw,nw,n,nw,ne,n,nw,nw,nw,n,nw,nw,nw,nw,nw,n,nw,ne,nw,sw,s,nw,sw,nw,s,nw,nw,nw,se,n,n,sw,nw,nw,s,nw,nw,nw,s,n,ne,n,nw,s,n,n,nw,n,n,n,nw,nw,nw,nw,n,nw,nw,n,nw,nw,nw,s,sw,nw,nw,n,nw,n,nw,n,s,nw,nw,n,sw,n,nw,nw,n,nw,sw,se,n,nw,nw,nw,nw,n,n,nw,nw,n,nw,n,nw,nw,nw,nw,nw,se,nw,n,nw,nw,nw,n,nw,nw,nw,ne,s,nw,n,nw,s,se,n,nw,nw,n,nw,s,se,n,n,nw,nw,nw,sw,nw,n,nw,sw,nw,nw,s,nw,nw,nw,s,nw,s,sw,nw,nw,nw,nw,nw,nw,ne,nw,nw,se,nw,nw,nw,nw,n,nw,nw,se,nw,nw,nw,nw,nw,nw,n,s,nw,nw,n,nw,sw,nw,nw,nw,nw,nw,nw,s,nw,nw,nw,nw,sw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,nw,n,nw,nw,sw,nw,nw,nw,nw,nw,nw,nw,nw,nw,se,nw,nw,nw,nw,n,sw,nw,sw,n,nw,nw,nw,se,nw,nw,sw,nw,sw,se,sw,nw,nw,sw,nw,nw,nw,nw,nw,n,s,ne,nw,s,nw,nw,nw,nw,n,nw,nw,s,nw,nw,nw,nw,nw,ne,ne,nw,nw,se,nw,sw,nw,nw,nw,nw,nw,ne,nw,nw,nw,nw,sw,ne,nw,nw,nw,sw,nw,nw,s,se,nw,nw,s,nw,nw,ne,nw,nw,nw,se,nw,se,n,nw,nw,sw,se,sw,nw,se,sw,nw,nw,nw,n,sw,nw,nw,nw,nw,nw,nw,se,nw,nw,sw,nw,sw,sw,nw,ne,nw,nw,sw,ne,nw,sw,sw,nw,nw,nw,sw,nw,nw,nw,n,sw,se,nw,sw,nw,nw,nw,se,nw,nw,sw,ne,nw,sw,sw,n,nw,nw,nw,sw,nw,nw,sw,nw,nw,sw,se,se,nw,nw,nw,nw,nw,nw,nw,sw,nw,sw,nw,nw,se,n,se,sw,nw,sw,nw,sw,se,nw,nw,sw,nw,nw,nw,n,sw,nw,nw,nw,sw,nw,sw,nw,nw,se,nw,nw,nw,nw,nw,ne,nw,ne,nw,nw,nw,nw,nw,nw,n,sw,nw,sw,n,nw,sw,sw,nw,nw,nw,n,n,nw,nw,sw,nw,nw,nw,sw,nw,nw,n,nw,n,nw,n,nw,nw,nw,nw,sw,sw,nw,sw,n,sw,sw,nw,nw,sw,sw,nw,sw,sw,nw,nw,nw,ne,nw,nw,nw,sw,n,nw,sw,nw,ne,sw,nw,ne,nw,nw,n,ne,nw,n,nw,s,n,sw,nw,nw,sw,nw,nw,s,nw,sw,sw,nw,se,sw,nw,sw,nw,sw,sw,sw,nw,s,se,sw,nw,nw,sw,se,sw,sw,ne,nw,nw,sw,sw,se,ne,nw,nw,s,se,ne,sw,nw,nw,nw,nw,sw,ne,ne,sw,nw,sw,nw,ne,nw,s,sw,sw,sw,nw,s,sw,nw,nw,nw,sw,nw,nw,ne,nw,n,nw,nw,nw,sw,nw,sw,sw,nw,nw,nw,nw,ne,ne,nw,nw,nw,s,s,sw,n,nw,sw,sw,sw,sw,sw,sw,nw,nw,s,s,nw,nw,sw,sw,sw,sw,nw,sw,sw,ne,nw,n,nw,nw,ne,sw,s,sw,ne,sw,ne,sw,sw,sw,sw,nw,sw,nw,sw,sw,nw,nw,s,nw,sw,nw,nw,n,sw,sw,sw,sw,nw,sw,nw,sw,n,nw,se,nw,sw,sw,sw,sw,nw,sw,sw,sw,sw,sw,nw,nw,sw,nw,sw,sw,sw,nw,sw,sw,sw,sw,sw,nw,ne,sw,nw,nw,nw,sw,nw,nw,nw,sw,sw,sw,nw,nw,sw,sw,sw,se,sw,nw,nw,sw,sw,ne,sw,sw,nw,sw,n,sw,nw,nw,sw,sw,sw,nw,sw,nw,sw,sw,s,nw,sw,sw,sw,se,s,sw,sw,sw,nw,s,sw,sw,sw,sw,sw,nw,sw,nw,sw,nw,nw,nw,sw,nw,sw,nw,nw,sw,nw,sw,sw,nw,sw,se,sw,sw,nw,sw,se,sw,ne,ne,sw,sw,sw,sw,nw,s,nw,nw,se,sw,nw,sw,nw,sw,sw,sw,sw,se,se,s,sw,sw,sw,nw,sw,nw,sw,nw,ne,nw,sw,sw,sw,s,s,sw,sw,sw,nw,se,sw,nw,sw,sw,se,nw,s,nw,sw,nw,sw,se,ne,sw,sw,sw,nw,nw,nw,nw,sw,nw,ne,sw,sw,nw,sw,sw,sw,sw,se,se,sw,sw,se,s,sw,se,ne,se,sw,sw,sw,sw,sw,sw,sw,sw,sw,sw,sw,sw,sw,sw,nw,nw,nw,nw,sw,sw,sw,sw,sw,sw,sw,nw,sw,s,sw,nw,sw,sw,sw,sw,sw,sw,sw,sw,sw,sw,sw,sw,sw,sw,sw,se,sw,n,sw,sw,sw,ne,sw,sw,sw,sw,s,ne,sw,sw,n,sw,sw,sw,nw,sw,sw,se,sw,sw,sw,sw,nw,sw,sw,sw,sw,sw,sw,sw,sw,se,ne,sw,sw,sw,nw,nw,sw,sw,se,sw,sw,sw,sw,sw,sw,sw,sw,sw,sw,sw,sw,sw,sw,sw,nw,sw,n,sw,sw,sw,sw,sw,sw,sw,nw,sw,sw,sw,sw,sw,sw,se,sw,s,n,s,s,sw,sw,sw,sw,ne,sw,n,se,sw,sw,sw,sw
EOT;
        $this->getShortestPathSize($moves)->shouldBe(818);
        $this->getFurthestDistanceEver($moves)->shouldBe(1596);
    }
}
