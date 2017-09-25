<?php
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../lib/functions.php');
//$ip = $_SERVER["REMOTE_ADDR"];
//ip_check($ip);

$app = new MyApp\Controller\Post();
$app->run();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>メール送信</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="high" class="clearfix">
		<div class="welcome_msg">管理画面</div>
		<div class="logout_btn">	    <form action="logout.php" method="post" id="logout">
		      <?= h($app->me()->email); ?> <input type="submit" value="ログアウト">
		      <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
		    </form>
  </div>
	</div>
	<div id="side">
		<div class="menu_body"><a href="#">アドレス一覧</a></div>
		<div class="menu_body"><a href="post_send.php">メール作成</a></div>
	</div>
		<div id="main_edit">
			<?php $app->ok(); ?>
	<h1>新規投稿</h1>
	<form id="insert" method="post">
	<div class="koumoku-box">
	<h2>タイトル[必須]</h2>
	<input type="text" name="title" size="50" required>
	</div>
	<div class="koumoku-box">
	<h2>本文[必須]</h2>
	<textarea name="contain" cols="100" rows="50" required=""></textarea>
	</div>
	<div class="btn" onclick="document.getElementById('insert').submit();">確定</div>
	</form>
	</div>
</div>
</body>
</html>
