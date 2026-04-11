<?php
class Validator {
  public static function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  public static function validateString($string, $minLength = 2, $maxLength = 100) {
    $string = trim($string);
    return strlen($string) >= $minLength && strlen($string) <= $maxLength;
  }
}
?>