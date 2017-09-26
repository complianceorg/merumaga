<?php

namespace MyApp\Model;

class User extends \MyApp\Model {

  public function create($values) {
    $stmt = $this->db->prepare("insert into user_table (user_id, ID, password, created, modified) values (NULL, :ID, :password, now(), now())");
    $res = $stmt->execute([
      ':ID' => $values['ID'],
      ':password' => password_hash($values['password'], PASSWORD_DEFAULT)
    ]);
    if ($res === false) {
      throw new \MyApp\Exception\DuplicateID();
    }
  }
  public function login($values) {
    $stmt = $this->db->prepare("select * from user_table where ID = :ID");

    $stmt->execute([
      ':ID' => $values['ID']
      ]
      );
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    $user = $stmt->fetch();

    if (empty($user)) {
      throw new \MyApp\Exception\UnmatchIDOrPassword();
    }

    if (!password_verify($values['password'], $user->password)) {
      throw new \MyApp\Exception\UnmatchIDOrPassword();
    }

    return $user;
  }
  public function findAll() {
    $stmt = $this->db->query("select * from user_table order by user_id");
    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    return $stmt->fetchAll();
  }

}
