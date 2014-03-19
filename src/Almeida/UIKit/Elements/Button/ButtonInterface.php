<?php
/*
 * This file is part of the Almeida\UIKit package.
 *
 * (c) Arnold Almeida <arnold.almeida@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Almeida\UIKit\Elements\Button;


interface ButtonInterface {

    // standard button
    public function standard($label, $url, $options=array());

    // primary button
    public function primary($label, $url, $options=array());

    // submit button
    public function submit($label, $url, $options=array());

}