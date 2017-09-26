<?php

namespace MyApp\Exception;

class InvalidPassword extends \Exception {
  protected $message = 'Passwordが無効です';
}