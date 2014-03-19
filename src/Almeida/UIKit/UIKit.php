<?php
/*
 * This file is part of the Almeida\UIKit package.
 *
 * (c) Arnold Almeida <arnold.almeida@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Almeida\UIKit;

use Almeida\UIKit\Lib\Manager;

class UIKit extends Manager
{

    /**
     * TableInterface implemented
     */
    public $Table = null;

    /**
     * ActionsInterface implemented
     */
    public $Actions = null;

    /**
     * ButtonInterface implemented
     */
    public $Button = null;

    /**
     * ButtonGroup implemented
     */
    public $ButtonGroup = null;

    /**
     * TypographyInterface implemented
     */
    public $Typography = null;


    public function header($str, $options=array())
    {
        return $this->Typography->header('h1', $str, $options);
    }

    /**
     * UIKit::table()
     *
     * @param  Array  $data    Key value pairs
     * @param  array  $options [description]
     * @return [type]          [description]
     */
    public function table($data, $options=array())
    {
        return $this->Table->make($data, $options);
    }

    /**
     * UIKit::actions()
     * @return [type] [description]
     */
    public function actions($actions, $options=array())
    {
        return $this->Actions->make($actions, $options);
    }

    /**
     * UIKit::buttonGroup()
     * @return [type] [description]
     */
    public function buttonGroup($actions, $type, $options=array())
    {
        return $this->ButtonGroup->build($actions, $type, $options);
    }

    public function pagination()
    {
        // todo
    }

}
