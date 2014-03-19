<?php

namespace spec\Almeida\UIKit\Elements\Typography\Generators;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Html5TypographySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Almeida\UIKit\Elements\Typography\Generators\Html5Typography');
    }

    function it_should_render_a_h1_tag_when_header_is_called()
    {
        $this->header('h1', 'test')->shouldBeEqualTo('<h1>test</h1>');
    }

    function it_should_render_a_h1_tag()
    {
        $this->h1('test')->shouldBeEqualTo('<h1>test</h1>');
    }

    function it_should_render_a_h2_tag()
    {
        $this->h2('test')->shouldBeEqualTo('<h2>test</h2>');
    }

    function it_should_render_a_h3_tag()
    {
        $this->h3('test')->shouldBeEqualTo('<h3>test</h3>');
    }

    function it_should_render_a_h4_tag()
    {
        $this->h4('test')->shouldBeEqualTo('<h4>test</h4>');
    }

    function it_should_render_a_h5_tag()
    {
        $this->h5('test')->shouldBeEqualTo('<h5>test</h5>');
    }

    function it_should_render_a_h6_tag()
    {
        $this->h6('test')->shouldBeEqualTo('<h6>test</h6>');
    }


}
