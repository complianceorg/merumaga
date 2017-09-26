<?php

namespace MyApp\Controller;

class Post extends \MyApp\Controller {

  public function run() {
    if (!$this->isLoggedIn()) {
      header('Location: ' . SITE_URL."login.php");
      exit;
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->postProcess();
    }
  }

  public function ok(){
    if ($_GET["insert"]=="ok") {
      echo "新規投稿完了しました";
    }

  }

  protected function postProcess() {

        $postModel = new \MyApp\Model\Post();
        $postModel->create([
          'title' => $_POST['title'],
          'contain' => $_POST['contain']
        ]);


      header('Location: ' . SITE_URL . 'post_send.php?insert=ok');
      exit;
      }
    }
