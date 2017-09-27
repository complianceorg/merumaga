  <?php
	include_once(__DIR__ . '/default/default.php');
	$app = new MyApp\Controller\Address();
	$app->run();
	?>
  <div id="main_edit">
	<h1>アドレス一覧</h1>
	<div class="kizi-box">
    <p>ドメイン/public/login/signupから</p>
    <select name="" class="kizi-list-box">
		<?php foreach ($app->getValues()->addresses as $address) : ?>
			<option><?= h($address->email);?></option>
	  <?php endforeach; ?>
  　</select>
  　<span>(<?= count($app->getValues()->addresses); ?>)</span>

    <p>その他から</p>
    <select name="" class="kizi-list-box">
    <?php foreach ($app->getValues()->addresses_post as $address) : ?>
      <option><?= h($address->email);?></option>
    <?php endforeach; ?>
  　</select>
  　<span>(<?= count($app->getValues()->addresses_post); ?>)</span>

	</div>
</div>
</body>
</html>
