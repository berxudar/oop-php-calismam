<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of arrayPatern
 *
 * @author zeus
 */
class arrayPatern {
   
    
    public function __invoke($patern,$callback) {
        if (is_array($patern)) {

            foreach ($patern as $row) {

                (new Router(Router::$url))->get($patern, $callback);
            }


            die();
        }
    }
}
