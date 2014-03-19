<?php
namespace Almeida\UIKit\Collections\Feedback;

interface FeedbackInterface
{
    /**
     * Render a message, flaging that is informational
     *
     */
    public function info($msg, $options=array());

    /**
     * Render a message with errors
     */
    public function error($msg, $options=array());

    /**
     * Render a warning message
     */
    public function warning($msg, $options=array());

    /**
     * Render a success message
     */
    public function success($msg, $options=array());

    /**
     * Render a default message block
     */
    public function block($msg, $options=array());

    /**
     * Render a block when there is no data.
     *
     * ie. No Orders placed yet etc.
     */
    public function noData($options=array());

}