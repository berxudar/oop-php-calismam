<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mainRouter
 *
 * @author zeus
 */
class mainRouter {

    private $callback, $url, $urlarray, $paternarray, $urlcount,
            $paterncount, $sayi;
    private static $instance;

    public function __construct($patern, $callback) {
       
        $this->sayi = 0;
        $this->url = Router::$url;
        $this->paternarray = explode("/", trim($patern, "/"));
        $this->urlarray = explode("/", trim($this->url, "/"));
        $this->paterncount = count($this->paternarray);
        $this->urlcount = count($this->urlarray);
        $this->callback = $callback;
        $this->isExecablemethod();
        
    }

    function isExecablemethod() {





        if ($this->paterncount == $this->urlcount) {


            foreach ($this->paternarray as $key => $val) {



                if (stristr($val, ":")) {

                    $this->sayi += 1;
                } else {
                    if ($val == $this->urlarray[$key]) {

                        $this->sayi += 1;
                    } else {

                        $this->sayi -= 1;
                    }
                }
            }
        }


        if ($this->sayi == $this->paterncount) {


            new callbackMethod($this->urlarray, $this->callback);
        }
    }

}
