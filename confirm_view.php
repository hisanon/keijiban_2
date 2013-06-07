<?php
require_once 'confirm_controll.php';

switch($comments){
	case "confirm":
		//登録確認画面
		echo '　名前：　'.$name.'<br/>';
		echo 'コメント：'.$comment.'<br/>';
		echo '削除パス：'.$pass.'<br/><br/>';	
		echo 'この内容で書き込みしますか？';
		echo $button;
		echo '<a href ="index.php">戻る</a>';

		
	break;

	case "completion":
		//登録完了画面の表示
		echo '<font color ="red">コメントが登録されました。</font><br/>';
		echo '<a href ="index.php">戻る</a><br/>';
		
	break;
	
	case "error":
		//エラー
		echo '<font color ="red">error!: 全ての項目を入力して下さい！</font><br/>';
		echo '<a href ="index.php">戻る</a><br/>';

	
	break;
	
	default:
}
?>	
