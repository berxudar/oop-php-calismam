<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of callbackMethod
 *
 * @author zeus
 */
class callbackMethod
{

    /**
     * callbackMethod constructor.
     * @param $url
     * @param $callback
     */
    public function __construct($url, $callback)
    {


        if (is_callable($callback)) {

            call_user_func_array($callback, $url);
            Router::$found += 1;
            die();
        } else {

            (new DetectConMet)($callback, $url);
        }
    }

}
