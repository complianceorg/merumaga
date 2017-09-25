<?php

// ログイン
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../lib/functions.php');
//$ip = $_SERVER["REMOTE_ADDR"];
//ip_check($ip);

$app = new MyApp\Controller\Login();
$app->run();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>ログイン</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="container">
    <form action="" method="post" id="login">
      <p>
        <input type="text" name="ID" placeholder="ID" value="<?= isset($app->getValues()->ID) ? h($app->getValues()->ID) : ''; ?>">
      </p>
      <p>
        <input type="password" name="password" placeholder="password">
      </p>
      <p class="err"><?= h($app->getErrors('login')); ?></p>
      <div class="btn" onclick="document.getElementById('login').submit();">ログイン</div>
      <p class="fs12"><a href="signup.php">新規登録</a></p>
      <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
   </form>
  </div>
</body>
</html>
