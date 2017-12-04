<?php

namespace spec\ColinODell\Advent;

use ColinODell\Advent\Day4Part1;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Day4Part1Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Day4Part1::class);
    }

    function it_should_be_true_for_aa_bb_cc_dd_ee()
    {
        $this->isValid('aa bb cc dd ee')->shouldBe(true);
    }

    function it_should_be_false_for_aa_bb_cc_dd_aa()
    {
        $this->isValid('aa bb cc dd aa')->shouldBe(false);
    }

    function it_should_be_true_for_aa_bb_cc_dd_aaa()
    {
        $this->isValid('aa bb cc dd aaa')->shouldBe(true);
    }
}
