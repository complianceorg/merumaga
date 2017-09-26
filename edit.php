<?php
  require_once(__DIR__ . '/default/default.php');
	$app = new MyApp\Controller\Edit();
	$app->run();
?>
	<div id="main_edit">
			<?php $app->ok(); ?>
	<h1>投稿編集</h1>
  <?php foreach ($app->getValues()->getposts as $post) : ?>
	<form id="edit" method="post">
	<div class="koumoku-box">
	<h2>タイトル[必須]</h2>
  <input type="hidden" name="id" value="<?= h($post->id); ?>">
  <input type="text" name="title" size="50" value="<?= h($post->contain); ?>">
	</div>
	<div class="koumoku-box">
	<h2>本文[必須]</h2>
	<textarea name="contain" cols="100" rows="50" required=""><?= h($post->contain); ?></textarea>
	</div>
	<div class="btn" onclick="document.getElementById('edit').submit();">確定</div>
	</form>
  <?php endforeach; ?>
	</div>
</div>
</body>
</html>
