<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*

ders/php/5/45
*/
$app->get("/ders/php/:param/:id",function(){


echo 5+5;

});

$app->get("/ders/mvc/:id","control:eylem");

$app->get("/",function(){
    
    
   return view("form");
});



$app->get("aslan/:id","asd:mtd");


$app->get("haberler",function(){


});


