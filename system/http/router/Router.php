<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Router
 *
 * @author zeus
 */
use duncan3dc\Laravel\BladeInstance;

class Router {

    public static $url;
    public static $found = 0;

    /**
     * Router constructor.
     * @param $url
     */
    public function __construct($url) {
        self::$url = $url;

        function view($file, $vars = []) {



            $blade = new BladeInstance("app/views/", "cache/");

            echo $blade->render($file, $vars);
        }

        function csrf_token() {

            session_start();
            $_SESSION["csrf_token"] = $_SESSION["csrf_token"] ?? uniqid();
            return $_SESSION["csrf_token"];
        }

    }

    /**
     * @param $name
     * @param $arguments
     */
    public function __call($name, $arguments) {



        if (strtoupper($name) == $_SERVER["REQUEST_METHOD"]) {

            new mainRouter($arguments[0], $arguments[1]);
        }
    }

}
