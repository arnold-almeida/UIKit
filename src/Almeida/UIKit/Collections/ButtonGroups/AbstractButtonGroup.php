<?php
/*
 * This file is part of the Almeida\UIKit package.
 *
 * (c) Arnold Almeida <arnold.almeida@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Almeida\UIKit\Collections\ButtonGroups;

use Almeida\UIKit\Collections\Collection;
use Almeida\UIKit\Collections\ButtonGroups\ButtonGroupInterface;

// Need this to resole
use Almeida\UIKit\Collections\Actions\ActionsInterface;

// @todo - Remove laravel dependency ?
use Illuminate\Support\Facades\URL;

abstract class AbstractButtonGroup extends Collection implements ButtonGroupInterface
{

    public function __construct($options=array(), ActionsInterface $action)
    {
        $this->options = array_merge($this->defaults, $options);
        $this->Actions = $action;
    }

    public function build($actions=array(), $type, $options=array())
    {

        return $this->{$type}($actions);
    }

    public function generateUrl($url)
    {
        // Generate the route
        $namedRoute = (is_array($url)) ? $url[0] : $url;
        $params     = (isset($url[1])) ? $url[1] : array();

        return URL::route($namedRoute, $params);
    }

    public function splitButtonDropdown($actions=array(), $options=array())
    {
        return '-- @todo --';
    }

}