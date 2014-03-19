<?php
/*
 * This file is part of the Almeida\UIKit package.
 *
 * (c) Arnold Almeida <arnold.almeida@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Almeida\UIKit\Collections\Actions\Generators;

use Almeida\UIKit\Collections\Actions\AbstractActions;

class BootstrapActions extends AbstractActions
{

    /**
     * [group description]
     * @param  Array  $actions generated from a ButtonInterface
     * @return [type]          [description]
     */
    public function group($actions=array())
    {
        return implode(', ', $actions);
    }

}