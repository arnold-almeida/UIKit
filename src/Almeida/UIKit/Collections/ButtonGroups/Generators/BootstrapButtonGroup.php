<?php
/*
 * This file is part of the Almeida\UIKit package.
 *
 * (c) Arnold Almeida <arnold.almeida@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Almeida\UIKit\Collections\ButtonGroups\Generators;

use Almeida\UIKit\Collections\ButtonGroups\AbstractButtonGroup;

class BootstrapButtonGroup extends AbstractButtonGroup
{
    public function splitButtonDropdown($actions=array(), $options=array())
    {
      $actions = $this->Actions->map($actions);

      $out = ''
        .'<div class="btn-group">'
          .'<button type="button" class="btn btn-default"><a href="'.$actions[0]->url.'">'.$actions[0]->label.'</a></button>'
          .'<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">'
          .'<span class="caret"></span>'
          .'<span class="sr-only">Toggle Dropdown</span>'
        .'</button>'
        .'<ul class="dropdown-menu" role="menu">';

          unset($actions[0]);

          foreach ($actions as $i => $action) {
            $out.= '<li><a href="'.$action->url.'" title="'.$action->label.'">'.$action->label.'</a></li>';
          }

        $out.'</ul>'
      .'</div>';

      return $out;

    }
}