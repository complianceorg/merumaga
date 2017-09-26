<?php
  require_once(__DIR__ . '/default/default.php');
	$app = new MyApp\Controller\Post();
	$app->run();
?>
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
