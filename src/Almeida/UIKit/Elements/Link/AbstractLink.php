<?php
/*
 * This file is part of the Almeida\UIKit package.
 *
 * (c) Arnold Almeida <arnold.almeida@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Almeida\UIKit\Elements\Link;

use Almeida\UIKit\Elements\Element;
use Almeida\UIKit\Elements\Link\LinkInterface;

/**
 * Link
 *
 * Links indicate a possible user action.
 */
abstract class AbstractLink extends Element implements LinkInterface
{

    public $validAttributes = array(
        'href', 'title'
    );

    public function __construct()
    {
        $this->validAttributes = array_merge($this->validAttributes, $this->defaultValidAttributes);

        parent::__construct();
    }

    /**
     * Link::anchor()
     */
    public function anchor($label, $url, $options=array())
    {
        return '#';
    }

    /**
     * Link::hyperlink()
     */
    public function hyperlink($label, $url, $options=array())
    {
        if (is_null($label) || $label === false) $label = $url;

        $options    = $this->getOptions($options);
        $attributes = $this->filterValidAttributes($options);

        return '<a href="'.$url.'"'.$this->Html->attributes($attributes).'>'.$this->Html->entities($label).'</a>';
    }


}