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


interface ActionsInterface {

    /**
     * Return actions as ButtonGroup, List etc ?
     */
    public function group($actions=array());

}