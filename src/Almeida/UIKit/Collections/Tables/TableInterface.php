<?php
/*
 * This file is part of the Almeida\UIKit package.
 *
 * (c) Arnold Almeida <arnold.almeida@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Almeida\UIKit\Collections\Tables;

interface TableInterface {

    public function make($data, $options=array());

    /**
     * Sensible th attributes
     *
     * eg .
     *     <tr>
     *         <th class="th-title th-1">Title</th>
     */
    public function getHeaderClass($header, $count);

    /**
     * Sensible sort keys for th
     * eg .
     *     <tr>
     *         <th><a href="/?sort={$sortBy}&direction=asc">{$label}</a></th>
    */
    public function applyHeaderSort($label, $sortBy);

    /**
     * What should we render when no data is passed ?
     */
    public function hasNoData();


}
