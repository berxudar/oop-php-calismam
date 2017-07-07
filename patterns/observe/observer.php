<?php

/**
 * Created by PhpStorm.
 * User: zeus
 * Date: 28.06.2017
 * Time: 05:10
 */
interface  myintrface{
    function message();
    
}


class skype implements myintrface{
    
    function message(){
        
        echo "mesage from skype<br>";
    }
}


class gmail implements myintrface{
    
    function message(){
        
        return "mesage from gmail<br>";
    }
}

class observe{
  
    private $array=[];
    
    
    function register($obj){
        
        $this->array[]=$obj;
    }
    
    
    function setState(){
        
        
        foreach ($this->array as $val){
            
          echo   $val->message();
        }
        
    }
    
    
}


$obj=new gmail();
$ad=new observe;
$sky=new skype();
$ad->register($sky);
$ad->register($obj);
$ad->setState();