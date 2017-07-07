<?php

namespace App\controllers;

use App\models\users;



class control
{


    function eylem()
    {


        $data=new users;


        return view("deneme",compact("data"));
    }
}