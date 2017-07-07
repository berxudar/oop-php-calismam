<?php
/*
 *
 * required php 7 and php 7 ****
 */
include_once "error.php";
const URL="http://localhost/routing";



include_once 'vendor/autoload.php';





$url=$_GET["url"] ?? "/" ;

$app=new Router($url);

include_once 'routing.php';


(new detectNotFound)->notFound();