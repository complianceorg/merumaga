<?php

namespace MyApp\Controller;

class Signup extends \MyApp\Controller {

  public function run() {
    if ($this->isLoggedIn()) {
      header('Location: ' . SITE_URL);
      exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->postProcess();
    }
  }

  protected function postProcess() {
    // validate
    try {
      $this->_validate();
    } catch (\MyApp\Exception\InvalidID $e) {
      // echo $e->getMessage();
      // exit;
      $this->setErrors('ID', $e->getMessage());
    } catch (\MyApp\Exception\InvalidPassword $e) {
      // echo $e->getMessage();
      // exit;
      $this->setErrors('password', $e->getMessage());
    }

    // echo "success";
    // exit;

    $this->setValues('ID', $_POST['ID']);

    if ($this->hasError()) {
      return;
    } else {
          // create user
     try {
        $userModel = new \MyApp\Model\User();
        $userModel->create([
          'ID' => $_POST['ID'],
          'password' => $_POST['password']
        ]);
      } catch (\MyApp\Exception\DuplicateID $e) {
        $this->setErrors('ID', $e->getMessage());
        return;
      }

          // redirect to login
      header('Location: ' . SITE_URL . 'login.php');
      exit;
    }
  }

  private function _validate() {
    if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
      echo "Invalid Token!";
      exit;
    }

    if (!preg_match('/\A[a-zA-Z0-9]+\z/', $_POST['ID'])) {
      throw new \MyApp\Exception\InvalidID();
    }

    if (!preg_match('/\A[a-zA-Z0-9]+\z/', $_POST['password'])) {
      throw new \MyApp\Exception\InvalidPassword();
    }
  }

}
