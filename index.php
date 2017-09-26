  <?php
	include_once(__DIR__ . '/default/default.php');
	$app = new MyApp\Controller\Index();
	$app->run();
	?>
	<h1>メール一覧</h1>
	<div class="kizi-box">
		<?php foreach ($app->getValues()->posts as $post) : ?>
		<ul class="kizi-list-box">
			<li class="kizi-list"><?= h($post->title);?></li>
			<li class="kizi-list"><?= h($post->contain); ?></li>
		</ul>
		<a href="<?= SITE_URL.'edit.php?id='. h($post->id); ?>" class="list">詳細</a>
		<form id="send<?= h($post->id); ?>" action="" method="post">
			<input type="hidden" value="<?= h($post->id); ?>" name="id">
	    <div class="sendbtn" onclick="document.getElementById('send<?= h($post->id); ?>').submit();">メールを送る</div>
			<input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
		</form>
	  <?php endforeach; ?>
	</div>
</body>
</html>
