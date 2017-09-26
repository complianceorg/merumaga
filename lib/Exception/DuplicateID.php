<?php

namespace MyApp\Exception;

class DuplicateID extends \Exception {
  protected $message = 'すでに同じIDが登録されています';
}