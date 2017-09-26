<?php

namespace MyApp\Exception;

class InvalidID extends \Exception {
  protected $message = 'IDが無効です';
}