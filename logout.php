<?php

require_once(__DIR__ . '/../config/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
    echo "Tokenがちがいます!";
    exit;
  }

  $_SESSION = [];

  // if (isset($_COOKIE[session_name()])) {
  //   setcookie(session_name(), '', time() - 86400, '/');
  // }

  if (isset($_COOKIE["PHPSESSID"])) {
     setcookie("PHPSESSID", '', time() - 1800, '/');
 }


  session_destroy();

}

header('Location: ' . SITE_URL);
