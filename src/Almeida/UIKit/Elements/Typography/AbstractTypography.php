<?php
/*
 * This file is part of the Almeida\UIKit package.
 *
 * (c) Arnold Almeida <arnold.almeida@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Almeida\UIKit\Elements\Typography;

use Almeida\UIKit\Elements\Element;
use Almeida\UIKit\Elements\Typography\TypographyInterface;

abstract class AbstractTypography extends Element implements TypographyInterface
{

    public function h1($str, $options=array())
    {
        return $this->header('h1', $str, $options);
    }

    public function h2($str, $options=array())
    {
        return $this->header('h2', $str, $options);
    }

    public function h3($str, $options=array())
    {
        return $this->header('h3', $str, $options);
    }

    public function h4($str, $options=array())
    {
        return $this->header('h4', $str, $options);
    }

    public function h5($str, $options=array())
    {
        return $this->header('h5', $str, $options);
    }

    public function h6($str, $options=array())
    {
        return $this->header('h6', $str, $options);
    }

    public function header($tag='h1', $str, $options=array())
    {
        $attrs = $this->filterValidAttributes(array_merge($this->attributes, $options));

        if (empty($attrs)) {
            return "<{$tag}>{$str}</{$tag}>";
        }

        return "<{$tag} {$this->Html->attributes($attrs)}>{$str}</{$tag}>";

    }

}