<?php

namespace MyApp\Model;

class Address extends \MyApp\Model {

  public function create($values) {
    // $stmt = $this->db->prepare("insert into user_table (user_id, ID, password, created, modified) values (NULL, :ID, :password, now(), now())");
    // $res = $stmt->execute([
    //   ':ID' => $values['ID'],
    //   ':password' => password_hash($values['password'], PASSWORD_DEFAULT)
    // ]);
    // if ($res === false) {
    //   throw new \MyApp\Exception\DuplicateID();
    // }
  }

  public function findAll() {
    $stmt = $this->db2->query("select * from users");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }


  public function findaddress() {
    $stmt = $this->db2->query("select email from users");
    $result=$stmt->fetchAll(\PDO::FETCH_ASSOC);
  //  var_dump($result);
    return $result;
  }

}
