<?php

namespace MyApp\Exception;

class UnmatchIDOrPassword extends \Exception {
  protected $message = 'ID/Passwordが違います';
}