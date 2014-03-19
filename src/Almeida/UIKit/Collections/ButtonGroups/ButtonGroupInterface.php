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


interface ButtonGroupInterface
{

    /**
     * Split Button
     *
     * @todo - Consider renaming to splitButton() ?
     *
     */
    public function splitButtonDropdown($actions=array(), $options=array());

}