<?php

namespace spec\ColinODell\Advent;

use ColinODell\Advent\Day8;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Day8Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Day8::class);
    }

    function it_should_pass_the_first_example()
    {
        $instructions = <<<EOT
b inc 5 if a > 1
a inc 1 if b < 5
c dec -10 if a >= 1
c inc -20 if c == 10
EOT;

        $this->run($instructions)->shouldBe([1, 10]);
    }

}
