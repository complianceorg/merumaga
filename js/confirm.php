	<script type="text/javascript">
	function confirm_1<?= h($post->id); ?>(){

		if(window.confirm('メルマガを登録者全員へ送信しますか？')){
			window.alert('メルマガを送信します');
			document.getElementById('send_1<?= h($post->id); ?>').submit();
		}else{
			window.alert('キャンセルされました');
		}

	}

	function confirm_2<?= h($post->id); ?>(){

		if(window.confirm('メルマガを掲示板からの人へ送信しますか？')){
			window.alert('メルマガを送信します');
			document.getElementById('send_2<?= h($post->id); ?>').submit();
		}else{
			window.alert('キャンセルされました');
		}

	}


	function confirm_3<?= h($post->id); ?>(){

		if(window.confirm('メルマガをその他の人へ送信しますか？')){
			window.alert('メルマガを送信します');
			document.getElementById('send_3<?= h($post->id); ?>').submit();
		}else{
			window.alert('キャンセルされました');
		}

	}

	</script>
