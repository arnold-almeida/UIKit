<?php
/*
 * This file is part of the Almeida\UIKit package.
 *
 * (c) Arnold Almeida <arnold.almeida@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Almeida\UIKit\Elements\Link\Generators;

use Almeida\UIKit\Elements\Link\AbstractLink;

class Bootstrap extends AbstractLink
{

    /**
     * Returns a Bootstrap flavoured hypelink
     */
    public function hyperlink($label, $url, $options=array())
    {
        $defaults = array(
            'class' => 'btn btn-info'
        );
        $options = array_merge($defaults, $options);
        return parent::hyperlink($label, $url, $options);
    }
}