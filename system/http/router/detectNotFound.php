<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of detectNotFound
 *
 * @author zeus
 */
class detectNotFound {


    /**
     * @return mixed
     */
    function notFound(){
        
        
        if(Router::$found==0)
            
         return view(404);

    }
}
