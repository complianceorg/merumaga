  <?php
  include_once(__DIR__ . '/default/default.php');
	$app = new MyApp\Controller\Index();
	$app->run();
	?>
  <div id="main_edit">
	<h1>メール一覧</h1>
  <div class="message">
    <p>送信先は<a href="address.php">アドレス一覧</a>を確認してください</p><br>
    <?php $app->ok(); ?>
  </div>
	<div class="kizi-box">
    <table border="1" bordercolor="#7fb8ff">
      <thead>
      <tr>
        <th>件名</th>
        <th>本文</th>
        <th>詳細</th>
        <th>削除</th>
        <th><a href="address.php"></a>登録者全員へ</th>
        <th>掲示板からの人へ</th>
        <th>その他の人へ</th>
      </tr>
      </thead>
      <tbody>
		<?php foreach ($app->getValues()->posts as $post) : ?>
      <tr>
        <td><?= h(mb_strimwidth($post->title, 0, 10 ,"...","utf8")); ?></td>
        <td><?= h(mb_strimwidth($post->contain, 0, 20 ,"...","utf8")); ?></td>
        <td><a href="<?= SITE_URL.'edit.php?id='. h($post->id); ?>" class="list">詳細</a></td>
        <td>
          <form id="delete" action="" method="post">
            <input type="button" value="削除" onclick="document.getElementById('delete').submit()">
            <input type="hidden" value="<?= h($post->id); ?>" name="deleteid">
      			<input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
          </form>
  		  </td>
        <td>
          <form id="send_1<?= h($post->id); ?>" action="" method="post">
            <input type="button" value="メルマガ送信" onclick="confirm_1<?= h($post->id); ?>()">
            <input type="hidden" value="all" name="who">
            <input type="hidden" value="<?= h($post->id); ?>" name="id">
      			<input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
          </form>
  		  </td>
        <td>
          <form id="send_2<?= h($post->id); ?>" action="" method="post">
            <input type="button" value="メルマガ送信" onclick="confirm_2<?= h($post->id); ?>()">
            <input type="hidden" value="bbs" name="who">
            <input type="hidden" value="<?= h($post->id); ?>" name="id">
      			<input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
          </form>
        </td>
        <td>
          <form id="send_3<?= h($post->id); ?>" action="" method="post">
            <input type="button" value="メルマガ送信" onclick="confirm_3<?= h($post->id); ?>()">
            <input type="hidden" value="other" name="who">
            <input type="hidden" value="<?= h($post->id); ?>" name="id">
      			<input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
          </form>
        </td>
      </tr>
      <?php require(__DIR__ . '/js/confirm.php'); ?>
      <?php endforeach; ?>
      </tbody>
    </table>
	</div>
</div>
</body>
</html>
