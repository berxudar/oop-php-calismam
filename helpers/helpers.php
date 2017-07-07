<?php
/**
 * Created by PhpStorm.
 * User: zeus
 * Date: 28.06.2017
 * Time: 02:22
 */

namespace Helpers;


class helpers
{


  private static $factoryclass;

  public static function load(String $factoryclass){

      self::$factoryclass="Helpers\\$factoryclass";
      return new self::$factoryclass;
  }
}