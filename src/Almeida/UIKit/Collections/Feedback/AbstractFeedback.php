<?php
namespace Almeida\UIKit\Collections\Feedback;

use Almeida\UIKit\Collections\Collection;
use Almeida\UIKit\Collections\Feedback\FeedbackInterface;

abstract class AbstractFeedback extends Collection implements FeedbackInterface
{
    public $defaults = array(
        'icon' => 'icon-default'
    );

    public function info($msg, $options=array())
    {
        return $this->block($msg, array_merge(
            array(
                'type' => 'info',
                'icon' => 'icon-info'
            ),
            $options
        ));
    }

    public function error($msg, $options=array())
    {
        return $this->block($msg, array_merge(
            array(
                'type' => 'error',
                'icon' => 'icon-error'
            ),
            $options
        ));
    }

    public function warning($msg, $options=array())
    {
        return $this->block($msg, array_merge(
            array(
                'type' => 'warning',
                'icon' => 'icon-warning'
            ),
            $options
        ));
    }

    public function success($msg, $options=array())
    {
        return $this->block($msg, array_merge(
            array(
                'type' => 'success',
                'icon' => 'icon-success'
            ),
            $options
        ));
    }

    public function block($msg, $options=array())
    {
        $options = array_merge($this->defaults, $options);

        return "<div class=\"feedback-block {$options['type']}\">
           <div class=\"media\">
             <div class=\"media-image\">
               <span class=\"{$options['icon']} {$options['icon']}\"></span>
             </div>
             <div class=\"media-body\">
               <h4>
                 {$options['title']}
               </h4>
               <p>
                 {$msg}
               </p>
             </div>
           </div>
       </div>";
    }

    /**
     * Feedback::noData()
     */
    public function noData($options=array())
    {
    	$iconClass = (isset($options['icon-class'])) ? $options['icon-class'] : 'icon';
        $icon      = (isset($options['model'])) ? $options['model'] : 'default';
        $title     = (isset($options['behaviours']['no-data']['title'])) ? $options['behaviours']['no-data']['title'] : 'Info';
        $message   = (isset($options['behaviours']['no-data']['message'])) ? $options['behaviours']['no-data']['message'] : 'Set options.behaviours.no-data.message';

        // Linked label
        if (isset($options['noData']['subtext']) && (!empty($options['noData']['subtext']['url']))) {
            $secondary = $this->makeLink($options['noData']['subtext']['label'], $options['noData']['subtext']['url']);
        }

        // Label only
        if (isset($options['noData']['subtext'])) {
            $secondary = $options['noData']['subtext']['label'];
        }

        return '<div class="no-data panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><strong>'.$title.'</strong></h3>
            </div>
            <div class="panel-body">
              '.$message.'
            </div>
          </div>';
    }

    public function makeLink($label, $url) {
        return '-';
    }


}
