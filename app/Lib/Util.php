<?php

class Util {

  public static function getRandomStr($length = 25) {
    static $chars;
    if (!$chars) {
      $chars = array_flip(array_merge(
        range('a', 'z'), range('A', 'Z'), range('0', '9')
      ));
    }
    $str = '';
    for ($i = 0; $i < $length; ++$i) {
      $str .= array_rand($chars);
    }
    return $str;
  }
}
