<?php

namespace MyApp\Controller;

class Address extends \MyApp\Controller {

  public function run() {
    if (!$this->isLoggedIn()) {
      // もしloginしてなかったらログイン画面にとばす
      header('Location: ' . SITE_URL . 'login.php');
      exit;
    }


    $addressModel = new \MyApp\Model\Address();
    $this->setValues('addresses', $addressModel->findAll());

    $address_postModel = new \MyApp\Model\Address_post();
    $this->setValues('addresses_post', $address_postModel->findAll());


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->postProcess();
    }


  }


  protected function postProcess() {

      }




}
