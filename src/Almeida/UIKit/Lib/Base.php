<?php
/*
 * This file is part of the Almeida\UIKit package.
 *
 * (c) Arnold Almeida <arnold.almeida@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Almeida\UIKit\Lib;

use Illuminate\Html\HtmlBuilder;
use Illuminate\Routing\UrlGenerator;

/**
 * Common functions across Collections,Elements
 */
abstract class Base
{

    /**
     * Default options that can be used to create links
     */
    protected $defaultOptions = array(
        'attributes' => array()
    );

    public $defaultValidAttributes = array(
        'class' => "",
        'id' => ""
    );

    public $attributes = array();

    public function __construct()
    {
        $this->Html = new HtmlBuilder();
    }

    /**
     * Merge options
     * @return [type] [description]
     */
    protected function getOptions($options=array())
    {
        return array_merge($this->defaultOptions, $options);
    }

    protected function filterValidAttributes($attributes=array())
    {
        $attrs = array_merge($this->defaultValidAttributes, $attributes);

        foreach ($attrs as $key => $value) {
            if(empty($value)) {
                unset($attrs[$key]);
            }
        }

        return $attrs;
    }

    /**
     * Render compiled HTML
     */
    public function render()
    {
        $args = func_get_args();

        foreach ($args as $arg) {
            if(isset($this->output[$arg])) {
                return $this->output[$arg];
            }

            throw new Exception("{$arg} is not set!", 1);
        }
    }

}
