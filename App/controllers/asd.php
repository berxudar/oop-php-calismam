<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of asd
 *
 * @author zeus
 */
namespace App\controllers;

use App\models\users,
Helpers\helpers;

class asd {

    /**
     *
     */
    function mtd(){
        
        
        $resim="resim.png";
        
        $ar=[5,78,9];
        $degisken=123456;
        $var="urfa birecik";

        $deneme=helpers::load("deneme");

       $param=compact("ar","degisken","var","resim","deneme");
      
       
        return view("deneme",$param);
    }
}
