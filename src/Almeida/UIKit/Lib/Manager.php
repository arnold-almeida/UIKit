<?php
/*
 * This file is part of the Almeida\UIKit package.
 *
 * (c) Arnold Almeida <arnold.almeida@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Almeida\UIKit\Lib;

use League\Di\Container;

abstract class Manager
{
    protected $defaultGenerators = array(
        'Collection' => array(
            'Feedback'     => 'Almeida\UIKit\Collections\Feedback\Generators\Html5Feedback',
            'Table'        => 'Almeida\UIKit\Collections\Tables\Generators\Html5Table',
            'Actions'      => 'Almeida\UIKit\Collections\Actions\Generators\BootstrapActions',
            'ButtonGroups' => 'Almeida\UIKit\Collections\ButtonGroups\Generators\BootstrapButtonGroup',

        ),
        'Elements' => array(
			'Button'     => 'Almeida\UIKit\Elements\Button\Generators\Html5Button',
			'Link'       => 'Almeida\UIKit\Elements\Link\Generators\Html5Link',
			'Typography' => 'Almeida\UIKit\Elements\Typography\Generators\Html5Typography'
        )
    );

    // ???
    protected $options = [
    	'framework' => [
    		'Paginator' => 'Illuminate\Pagination\Paginator'
    	]
    ];


    public function __construct($generators=array(), $options=array())
    {
        $this->UIKit   = new Container();

        $this->generators = array_merge($this->defaultGenerators, $generators);

        // Resolve the Feedback UIKit we wish to implement
        $this->Feedback = $this->UIKit->resolve($this->generators['Collection']['Feedback']);

        // Resolve the Table UIKit we wish to implement
        $this->UIKit->bind($this->generators['Collection']['Table'])->addArgs(array($options, $this->Feedback));
        $this->Table = $this->UIKit->resolve($this->generators['Collection']['Table']);

        // Resolve the Button UIKit we wish to implement
        $this->Button = $this->UIKit->resolve($this->generators['Elements']['Button']);

        // Resolve the Link UIKit we wish to implement
        $this->Link = $this->UIKit->resolve($this->generators['Elements']['Link']);

        // Resolve the typography UIKit we wish to implement
        $this->Typography  = $this->UIKit->resolve($this->generators['Elements']['Typography']);

        // Resolve the actions UIKit we wish to implement
        $this->UIKit->bind($this->generators['Collection']['Actions'])->addArgs(array($options, $this->Button, $this->Link));
        $this->Actions = $this->UIKit->resolve($this->generators['Collection']['Actions']);

        // Resolve the button_groups UIKit we wish to implement
        $this->UIKit->bind($this->generators['Collection']['ButtonGroups'])->addArgs(array($options, $this->Actions));
        $this->ButtonGroup = $this->UIKit->resolve($this->generators['Collection']['ButtonGroups']);

        // Resolve Framework tools
        //$this->options = array_merge($this->options, $options);

        // Paginator
        //$this->Paginator = $this->options['framework']['Paginator'];

    }

    public static function detectEnvironment()
    {
        // haha
        return 'laravel4';
    }

    /**
     * Get framework environment
     * @param String $env raw|laravel4|cakephp
     */
    public static function getEnvironment()
    {
        return self::detectEnvironment();
    }




}
