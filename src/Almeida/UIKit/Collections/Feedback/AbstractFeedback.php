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
        $message   = (isset($options['noData']['message'])) ? $options['noData']['message'] : 'Default no data message.';

        $secondary = '';

        // Linked label
        if (isset($options['noData']['subtext']) && (!empty($options['noData']['subtext']['url']))) {
            $secondary = $this->makeLink($options['noData']['subtext']['label'], $options['noData']['subtext']['url']);
        }

        // Label only
        if (isset($options['noData']['subtext'])) {
            $secondary = $options['noData']['subtext']['label'];
        }

        return '<div class="no-data">
                 <div class="{$iconClass} {$icon}">
                 </div>
                 <h2>'.$message.'</h2>
                 <p>'.$secondary.'</p>
               </div>';
    }

    public function makeLink($label, $url) {
        return '-';
    }


}