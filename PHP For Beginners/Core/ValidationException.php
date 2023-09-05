<?php

namespace Core;

class ValidationException extends \Exception
{
  public readonly array $errors; // only assign once 재할당 금지
  public readonly array $old;

  public static function throw($errors, $old)
  {
    $instance = new static;

    $instance->errors = $errors;
    $instance->old = $old;

    throw $instance;
  }
}
