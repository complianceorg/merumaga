<?php

namespace MyApp\Controller;

class Index extends \MyApp\Controller {

  public function run() {
    if (!$this->isLoggedIn()) {
      // もしloginしてなかったらログイン画面にとばす
      header('Location: ' . SITE_URL . 'login.php');
      exit;
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->postProcess();
    }

    // get users info
    // $userModel = new \MyApp\Model\User();
    // $this->setValues('users', $userModel->findAll());

    $postModel = new \MyApp\Model\Post();
    $this->setValues('posts', $postModel->findAll());

  }


  protected function postProcess() {

        $postModel = new \MyApp\Model\Post();
        $result = $postModel->findmail(['id' => $_POST['id']]);
        //$this->setValues('post', $result);


        // $addressModel = new \MyApp\Model\Address();
        // $address = $addressModel->findaddress();
        // foreach ($address as $value) {
        //   $to="{$value},{$to}";
        // }
        // echo $to;
        // //var_dump($address);
        if (mb_send_mail("y_koga@compliance-co.jp", $result['title'], $result['contain'], 'From: admin')) {
           return header('Location: ' . SITE_URL . '?send=ok');
         }else {
           return header('Location: ' . SITE_URL . '?send=no');
         };

      }




}
