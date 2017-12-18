<?php

namespace spec\ColinODell\Advent;

use ColinODell\Advent\Day18;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Day18Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Day18::class);
    }

    function it_should_pass_the_first_example()
    {
        $this->run(<<<EOT
set a 1
add a 2
mul a a
mod a 5
snd a
set a 0
rcv a
jgz a -1
set a 1
jgz a -2
EOT
        )->shouldBe(4);
    }
    
    function it_should_pass_step1_with_my_custom_input()
    {
        $this->run(<<<EOT
set i 31
set a 1
mul p 17
jgz p p
mul a 2
add i -1
jgz i -2
add a -1
set i 127
set p 316
mul p 8505
mod p a
mul p 129749
add p 12345
mod p a
set b p
mod b 10000
snd b
add i -1
jgz i -9
jgz a 3
rcv b
jgz b -1
set f 0
set i 126
rcv a
rcv b
set p a
mul p -1
add p b
jgz p 4
snd a
set a b
jgz 1 3
snd b
set f 1
add i -1
jgz i -11
snd a
jgz f -16
jgz a -19
EOT
        )->shouldBe(2951);
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
