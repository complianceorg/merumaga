<?php

namespace MyApp\Controller;

class Edit extends \MyApp\Controller {

  public function run() {
    if (!$this->isLoggedIn()) {
      // もしloginしてなかったらログイン画面にとばす
      header('Location: ' . SITE_URL . 'login.php');
      exit;
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->postProcess();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      $this->getProcess();
    }


    // get users info
    // $userModel = new \MyApp\Model\User();
    // $this->setValues('users', $userModel->findAll());

    $postModel = new \MyApp\Model\Post();
    $this->setValues('posts', $postModel->findAll());

  }


  protected function postProcess() {

        // $postModel = new \MyApp\Model\Post();
        // $result = $postModel->whereid(['id' => $_POST['id']]);
        // $this->setValues('posts', $result);

        $postModel = new \MyApp\Model\Post();
        $postModel->update([
          'id' => $_POST['id'],
          'title' => $_POST['title'],
          'contain' => $_POST['contain']
        ]);


      header('Location: ' . SITE_URL . 'edit.php?edit=ok&id='.$_POST['id']);
      exit;


  }

  protected function getProcess() {

        $postModel = new \MyApp\Model\Post();
        if (!empty($_GET['id'])) {
          $result = $postModel->whereid(['id' => $_GET['id']]);
        }else{
          $result = $postModel->findAll();
        }
      //var_dump($result);
        $this->setValues('getposts', $result);

  }

  public function ok(){
    if ($_GET["edit"]=="ok") {
      echo "投稿編集完了しました";
    }
  }





}
