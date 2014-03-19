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

// @todo - remove laravel dependency ??
use Illuminate\Support\Facades\URL;

class Item
{

    /**
     * Label
     * @var String
     */
    public $label;

    /**
     * Url
     * @var [type]
     */
    public $url;

    /**
     * Is first action
     * @var boolean
     */
    public $isFirst = false;


    /**
     * Is last action
     * @var boolean
     */
    public $isLast = false;

    /**
     * Is current action
     * @var boolean
     */
    public $isCurrent = false;

    /**
     *
     * @param [type] $label   [description]
     * @param Mixed  $options
     *                String $label
     *                OR
     *                Array  $options
     */
    public function __construct($label, $options=array())
    {
        $this->label = $label;

        if (is_array($options)) {
            $this->url = $this->generateUrl($options);
        } else {
            // Assume its a normal URL
            $this->url = $options;
        }

        // @todo - Improve
        if (strstr($_SERVER['REQUEST_URI'], $this->url)) {
            $this->isCurrent = true;
        }
    }

    // @todo - Work out a better way
    public static function generateUrl($url)
    {
        // Generate the route
        $namedRoute = (is_array($url)) ? $url[0] : $url;
        $params     = (isset($url[1])) ? $url[1] : array();

        return URL::route($namedRoute, $params);
    }
}