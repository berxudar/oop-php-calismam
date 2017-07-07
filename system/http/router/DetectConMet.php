<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DetectConMet
 *
 * @author zeus
 */

use System\http\post\Request;
class DetectConMet {

    private $controller, $method;

    /**
     * @param $callback
     * @param $url
     */
    public function __invoke($callback, $url) {

        $this->controller = "App\\controllers\\" . explode(":", $callback)[0];
        $this->method = explode(":", $callback)[1];


           $_POST ? array_unshift($url,new Request()):"";


        call_user_func_array([new $this->controller, $this->method], $url);
        Router::$found += 1;
        die();
    }

}
