<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Sample game</title>
<style>
body { margin: 0; }
</style>
</head>
<body>
	<h1>Game name: {{ $game->name }}</h1>
</body>
<script src="{{ asset('sample_game/1/js/enchant.min.js') }}"></script>
<script type="text/javascript">
enchant();	// ライブラリの初期化
window.onload = function(){
	// 320×240ピクセルサイズの画面(Canvas)を作成
	var game = new Game(320, 240);
	
	@isset($records)
    // $records is defined and is not null...
	@endisset
	var fighter_image = "{{ asset('images/' . $game->flight_image)}}";
	var block_image = "{{ asset('images/' . $game->block_image)}}";
	

	// フレームレートの設定。15fpsに設定
	game.fps = 30;
	// 画像データをあらかじめ読み込ませる
	game.preload(fighter_image, block_image);
	// データの読み込みが完了したら処理
	game.onload = function(){
		// ラベルの設定
		var myLabel = new Label(game.score);
		myLabel.font = "16px";
		myLabel.color = "green";
		myLabel.x = 5;	// X座標
		myLabel.y = 20;	// Y座標
		game.rootScene.addChild(myLabel);
		// ブロックの設定
		var block = new Sprite(32, 32);
		block.image = game.assets[block_image];
		block.x = 160;
		block.y = 100;
		game.rootScene.addChild(block);
		// 自機の設定
		var fighter = new Sprite(32, 32);
		fighter.image = game.assets[fighter_image];
		fighter.x = 160;
		fighter.y = game.height - fighter.height;
		game.rootScene.addChild(fighter);
		// フレームイベントが発生したら処理
		fighter.addEventListener(Event.ENTER_FRAME, function(){
			// 自機を移動
			if (game.input.left && (fighter.x > 0)){ fighter.x = fighter.x - 4;	 }
			if (game.input.right && (fighter.x < game.width-fighter.width)){ fighter.x = fighter.x + 4; }
			if (game.input.up && (fighter.y > 0)){ fighter.y = fighter.y - 4;	 }
			if (game.input.down && (fighter.y < game.height-fighter.height)){ fighter.y = fighter.y + 4; }
			// ブロックとの当たり判定
			if (fighter.intersect(block)){
				myLabel.text = "当たりました";
			}else{
				myLabel.text = "当たっていません";
			}
		});
	}
	game.start();	// ゲーム処理開始
}

</script>
</html>