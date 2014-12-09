<?php
/*
 * This file is part of the Almeida\UIKit package.
 *
 * (c) Arnold Almeida <arnold.almeida@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Almeida\UIKit\Collections\Actions;

use Almeida\UIKit\Collections\Collection;
use Almeida\UIKit\Collections\Actions\ActionsInterface;

use Almeida\UIKit\Elements\Button\ButtonInterface;
use Almeida\UIKit\Elements\Link\LinkInterface;

use Almeida\UIKit\Collections\Actions\Item as Item;

abstract class AbstractActions extends Collection implements ActionsInterface
{
    public $defaults = array(
        'type' => 'hyperlink'    // Calls Link::hyperlink()
    );

    /**
     * Processed actions will be stored here
     * @var array
     */
    public $actions = array();


    public function __construct($options=array(), ButtonInterface $button, LinkInterface $link)
    {
        $this->options = array_merge($this->defaults, $options);
        $this->Button = $button;
        $this->Link   = $link;
    }

    /**
     *
     * @param  array  $actions [description]
     * @param  array  $options [description]
     * @return [type]          [description]
     */
    public function make($actions=array(), $options=array())
    {
        $out = [];
        foreach ($actions as $label => $url) {
            $url   = Item::generateUrl($url);
            $out[] = $this->Link->{$this->options['type']}($label, $url);
        }

        return implode(PHP_EOL, $out);
    }

    /**
     * Return actions as ButtonGroup, List etc ?
     */
    public function group($actions=array()) {

    }

    /**
     * Get actions mapped
     * Preserve structure
     * @param  array  $actions [description]
     * @param  array  $options [description]
     * @return [type]          [description]
     */
    public static function map($actions=array(), $options=array())
    {
        if (empty($actions)) {
            return null;
        }

        $out   = array();
        $count = 0;
        $len   = count($actions);

        foreach ($actions as $label => $mixed) {

            $count++;

            $action = new Item($label, $mixed);

            if ($count == 1) {
                $action->isFirst = true;
            }

            if ($count == $len) {
                $action->isLast = true;
            }

            $out[] = $action;

        }

        return $out;
    }


}
