<?php

namespace spec\ColinODell\Advent;

use ColinODell\Advent\Day13;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Day13Spec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Day13::class);
    }

    function it_should_pass_the_first_example()
    {
        $this->run(<<<EOT
0: 3
1: 2
4: 4
6: 4
EOT
)->shouldBe(24);
    }
    
    function it_should_pass_step1_with_my_custom_input()
    {
        $this->run(<<<EOT
0: 3
1: 2
2: 4
4: 4
6: 5
8: 6
10: 8
12: 8
14: 6
16: 6
18: 9
20: 8
22: 6
24: 10
26: 12
28: 8
30: 8
32: 14
34: 12
36: 8
38: 12
40: 12
42: 12
44: 12
46: 12
48: 14
50: 12
52: 12
54: 10
56: 14
58: 12
60: 14
62: 14
64: 14
66: 14
68: 14
70: 14
72: 14
74: 20
78: 14
80: 14
90: 17
96: 18
EOT
        )->shouldBe(2384);
    }

    function it_should_pass_the_second_example()
    {
        $this->getSafeDelay(<<<EOT
0: 3
1: 2
4: 4
6: 4
EOT
        )->shouldBe(10);
    }

    function it_should_pass_step2_with_my_custom_input()
    {
        $this->getSafeDelay(<<<EOT
0: 3
1: 2
2: 4
4: 4
6: 5
8: 6
10: 8
12: 8
14: 6
16: 6
18: 9
20: 8
22: 6
24: 10
26: 12
28: 8
30: 8
32: 14
34: 12
36: 8
38: 12
40: 12
42: 12
44: 12
46: 12
48: 14
50: 12
52: 12
54: 10
56: 14
58: 12
60: 14
62: 14
64: 14
66: 14
68: 14
70: 14
72: 14
74: 20
78: 14
80: 14
90: 17
96: 18
EOT
        )->shouldBe(3921270);
    }
}
