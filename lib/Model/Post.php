<?php

namespace MyApp\Model;

class Post extends \MyApp\Model {

  public function create($values) {
    $stmt = $this->db->prepare("insert into post_table (id,title,contain) values (NULL,:title,:contain)");
    $res = $stmt->execute([
      ':title' => $values['title'],
      ':contain' => $values['contain']
    ]);
  }


  public function update($values) {
    $stmt = $this->db->prepare("UPDATE post_table SET title=:title,contain=:contain WHERE id=:id");
    $res = $stmt->execute([
      ':id' => $values['id'],
      ':title' => $values['title'],
      ':contain' => $values['contain']
    ]);
  }

  public function delete($values){
    $stmt = $this->db->prepare("DELETE FROM `post_table` WHERE id=:id");
    $stmt->execute([':id' => $values['id']]);
  }


  public function findAll() {
  $stmt = $this->db->query("select * from post_table");
  $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
  return $stmt->fetchAll();
  }

  public function whereid($values) {
  $stmt = $this->db->prepare("SELECT * FROM `post_table` WHERE id = :id");
  $stmt->bindValue(':id', $values['id'],\PDO::PARAM_INT);
  $stmt->execute();
  $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
  return $stmt->fetchAll();
  //  $result=$stmt->fetch(\PDO::FETCH_ASSOC);
  //  var_dump($result);
  //  return $result;
  }


  public function findmail($values) {
  $stmt = $this->db->prepare("SELECT * FROM `post_table` WHERE id = :id");
  $stmt->bindValue(':id', $values['id'],\PDO::PARAM_INT);
  $stmt->execute();
  $result=$stmt->fetch(\PDO::FETCH_ASSOC);
  return $result;
  }



}
