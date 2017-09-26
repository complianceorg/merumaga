<?php
require_once(__DIR__ . '/../../config/config.php');
require_once(__DIR__ . '/../../lib/functions.php');
//$ip = $_SERVER["REMOTE_ADDR"];
//ip_check($ip);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>管理画面</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="high" class="clearfix">
		<div class="welcome_msg">管理画面</div>
		<div class="logout_btn">
		    <form action="logout.php" method="post" id="logout">
					<input type="submit" value="ログアウト">
		      <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
		    </form>
    </div>
	</div>
	<div id="side">
		<div class="menu_body"><a href="<?= SITE_URL; ?>">メール一覧</a></div>
		<div class="menu_body"><a href= "post_send.php" >メール作成</a></div>
		<div class="menu_body"><a href="edit.php">メール編集</a></div>
		<div class="menu_body"><a href="#">アドレス一覧</a></div>
	</div>
