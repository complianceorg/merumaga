  <?php
	include_once(__DIR__ . '/default/default.php');
	$app = new MyApp\Controller\Address();
	$app->run();
	?>
  <div id="main_edit">
	<h1>アドレス一覧</h1>
	<div class="kizi-box">
		<?php foreach ($app->getValues()->addresses as $address) : ?>
		<ul class="kizi-list-box">
			<li class="kizi-list"><?= h($address->email);?></li>
		</ul>
	  <?php endforeach; ?>
	</div>
</div>
</body>
</html>
