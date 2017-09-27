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

    $postModel = new \MyApp\Model\Post();
    $this->setValues('posts', $postModel->findAll());

  }

  public function ok(){
    switch ($_GET["send"]) {
      case 'ok':
      echo "送信完了しました";
      break;

      case 'no':
      echo "失敗しました。時間をおいて再度試して下さい。";
      break;


      default:
        echo "";
        break;
    }
  }



  protected function postProcess() {

      //詳細へ
        $postModel = new \MyApp\Model\Post();
        $result = $postModel->findmail(['id' => $_POST['id']]);

      //削除
      if (!empty($_POST["deleteid"])) {
        $postModel = new \MyApp\Model\Post();
        $postModel->delete(['id' => $_POST['deleteid']]);
      }


      //送信先取得$other
        $address_postModel = new \MyApp\Model\Address_post();
        $result_post_mail = $address_postModel->findAll();

        foreach ($result_post_mail as $address){
          $other.=$address->email.',';
        }

        //送信先取得$bbs
          $addressModel = new \MyApp\Model\Address();
          $result_mail = $addressModel->findAll();

          foreach ($result_mail as $address){
            $bbs.=$address->email.',';
          }

        //送信先条件分岐
        switch ($_POST['who']) {
          case 'all':

          if (mb_send_mail($other.$bbs, $result['title'], $result['contain'], 'From: admin')) {
             return header('Location: ' . SITE_URL . '?send=ok');
           }else {
             return header('Location: ' . SITE_URL . '?send=no');
           };

            break;

            case 'bbs':

            if (mb_send_mail($bbs, $result['title'], $result['contain'], 'From: admin')) {
               return header('Location: ' . SITE_URL . '?send=ok');
             }else {
               return header('Location: ' . SITE_URL . '?send=no');
             };

              break;

              case 'other':

            if (mb_send_mail($other, $result['title'], $result['contain'], 'From: admin')) {
               return header('Location: ' . SITE_URL . '?send=ok');
             }else {
               return header('Location: ' . SITE_URL . '?send=no');
             };

          break;

        }


      }




}
