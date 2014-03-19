<?php
/*
 * This file is part of the Almeida\UIKit package.
 *
 * (c) Arnold Almeida <arnold.almeida@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Almeida\UIKit\Utility;

class String
{
    /**
     * Slug a string
     */
    public static function slug($str='')
    {
        return preg_replace('/[^a-z0-9]/', '-', strtolower($str));
    }
}