<?php

namespace spec\ColinODell\Advent;

use ColinODell\Advent\Day4Part2;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Day4Part2Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Day4Part2::class);
    }

    function it_should_be_true_for_abcde_fghij()
    {
        $this->isValid('abcde fghij')->shouldBe(true);
    }

    function it_should_be_false_for_abcde_xyz_ecdab()
    {
        $this->isValid('abcde xyz ecdab')->shouldBe(false);
    }

    function it_should_be_true_for_a_ab_abc_abd_abf_abj()
    {
        $this->isValid('a ab abc abd abf abj')->shouldBe(true);
    }

    function it_should_be_true_for_iiii_oiii_ooii_oooi_oooo()
    {
        $this->isValid('iiii oiii ooii oooi oooo')->shouldBe(true);
    }

    function it_should_be_false_for_oiii_ioii_iioi_iiio()
    {
        $this->isValid('oiii ioii iioi iiio')->shouldBe(false);
    }
}
