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
		<div class="logout_btn"><a href="logout.php">ログアウト</a></div>
	</div>
	<div id="side">
		<div class="menu_body"><a href="#">アドレス一覧</a></div>
		<div class="menu_body"><a href="#">メール作成</a></div>
	</div>
		<div id="main_edit">
	<h1>新規投稿</h1>
	<form action="postnew_send.php" method="post" name="form1" onSubmit = "return check()" enctype="multipart/form-data">
	<div class="koumoku-box">
	<h2>タイトル[必須]</h2>
	<input type="text" name="text" size="50" value="">
	</div>
	<div class="koumoku-box">
	<h2>本文[必須]</h2>
	<textarea name="textarea" cols="100" rows="50" required=""></textarea>
	</div>
	<input type="submit" value="確定" class="hensyu_btn">
	</form>
	</div>
</div>
</body>
</html>