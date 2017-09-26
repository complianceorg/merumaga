<?php

namespace MyApp;

class Model {
  protected $db;
  protected $db2;

  public function __construct() {
    try {
      $this->db = new \PDO(DSN, DB_USERNAME, DB_PASSWORD);
      $this->db2 = new \PDO(DSN2, DB_USERNAME2, DB_PASSWORD2);
    } catch (\PDOException $e) {
      echo $e->getMessage();
      exit;
    }
  }
}
