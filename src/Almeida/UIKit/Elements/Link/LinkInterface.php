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


interface LinkInterface {

    /**
     * Link::anchor()
     */
    public function anchor($label, $url, $options=array());

    /**
     * Link::hyperlink()
     */
    public function hyperlink($label, $url, $options=array());

}