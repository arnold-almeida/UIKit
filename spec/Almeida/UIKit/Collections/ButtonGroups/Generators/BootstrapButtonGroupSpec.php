<?php

namespace spec\Almeida\UIKit\Collections\ButtonGroups\Generators;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BootstrapButtonGroupSpec extends ObjectBehavior
{
    function let(ActionsInterface $actions)
    {
        $actions = new ActionsInterface();
        $this->beConstructedWith([], $actions);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Almeida\UIKit\Collections\ButtonGroups\Generators\BootstrapButtonGroup');
    }


}
