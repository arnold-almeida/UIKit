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
    public $variations = array(
        'types' => array('btn-primary','btn-default', 'btn-danger', 'btn-success', 'btn-info', 'btn-warning', 'btn-danger'),
        'sizes' => array('input-group-sm', 'input-group-lg'),
    );

    public function splitButtonDropdown($actions=array(), $options=array())
    {

        if (empty($actions)) {
            return null;
        }

        $actions = $this->Actions->map($actions);

        $btnType = $this->getTypeVariation($options);

        $out = ''
        .'<div class="btn-group">'
          .'<a href="'.$actions[0]->url.'" class="btn '.$btnType.'">'.$actions[0]->label.'</a>';

        // Only add the split if more then one action is defined
        if (isset($actions[1])) {
          $out.='<button type="button" class="btn '.$btnType.' dropdown-toggle" data-toggle="dropdown">'
          .'<span class="caret"></span>'
            .'<span class="sr-only">Toggle Dropdown</span>'
          .'</button>'
          .'<ul class="dropdown-menu" role="menu">';

            unset($actions[0]);

            foreach ($actions as $i => $action) {
              $out.= '<li><a href="'.$action->url.'" title="'.$action->label.'">'.$action->label.'</a></li>';
            }

          $out.='</ul>';
        }

        $out.='</div>';

        return $out;

    }

    /**
     * [getTypeVariation description]
     * @return [type] [description]
     */
    public function getTypeVariation($options)
    {
      if (isset($options['variation']['type'])) {
        if (in_array('btn-'.$options['variation']['type'], $this->variations['types'])) {
            return 'btn-'.$options['variation']['type'];
        }
      }

      return 'btn-default';
    }
}
