<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of adapter
 *
 * @author zeus
 */
class eser {

    private $bas;
    public function __construct($a) {
          $this->bas=$a;
    }
    function yazar() {

        return "orhan pamuk";
    }

    function kitap() {


        return "kar adlı kitap";
    }

    
    
    function basim(){
        
        
        return $this->bas;
    }
}

class adapter {

    private $class;

    public function __construct($class) {
        $this->class = $class;
        return $this;
    }

    function get() {

echo $this->class->basim()."<br>";
        return $this->class->yazar() . " " . $this->class->kitap();
    }

}

$a = new eser(5);
echo (new adapter($a))->get();
