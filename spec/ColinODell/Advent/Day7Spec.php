<?php

namespace spec\ColinODell\Advent;

use ColinODell\Advent\Day7;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Day7Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Day7::class);
    }

    function it_should_pass_the_first_example()
    {
        $this->init(<<<EOT
pbga (66)
xhth (57)
ebii (61)
havc (66)
ktlj (57)
fwft (72) -> ktlj, cntj, xhth
qoyq (66)
padx (45) -> pbga, havc, qoyq
tknk (41) -> ugml, padx, fwft
jptl (61)
ugml (68) -> gyxo, ebii, jptl
gyxo (61)
cntj (57)
EOT
);
        $this->getTreeBottom()->shouldBe('tknk');
    }

    public function it_should_identify_what_the_unbalanced_weight_should_be()
    {
        $this->init(<<<EOT
pbga (66)
xhth (57)
ebii (61)
havc (66)
ktlj (57)
fwft (72) -> ktlj, cntj, xhth
qoyq (66)
padx (45) -> pbga, havc, qoyq
tknk (41) -> ugml, padx, fwft
jptl (61)
ugml (68) -> gyxo, ebii, jptl
gyxo (61)
cntj (57)
EOT
        );
        $this->findWhatUnbalancedWeightShouldBe()->shouldBe(60);
    }
}
