<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
  protected $errors = [];

  // 접근자 자료형 속성명
  // public array $attributes
  public function __construct(public array $attributes)
  {
    if (!Validator::email($attributes['email'])) {
      $this->errors['email'] = 'Please provide a valid email address';
    }

    if (!Validator::string($attributes['password'])) {
      $this->errors['password'] = 'Please provide a valid password';
    }

    return empty($this->errors);
  }

  public static function validate($attributes)
  {
    $instance = new static($attributes);
    return $instance->failed() ? $instance->throw() : $instance;
  }

  public function throw()
  {
    ValidationException::throw($this->errors(), $this->attributes);
  }

  public function failed()
  {
    return count($this->errors);
  }

  public function errors()
  {
    return $this->errors;
  }

  public function error($field, $message)
  {
    $this->errors[$field] = $message;

    return $this;
  }
}