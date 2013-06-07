<?php
require_once 'delete_controll.php';

switch($comments){
	case "completion":
		//削除完了
		echo '<br/><font color ="red">削除しました。</font>';
		echo '<a href ="index.php">戻る</a>';
	break;

	case "error":
		//パス違い
		echo '削除しようとしましたが、';
		echo '<br/><font color ="red">削除パスが認証されないため削除出来ませんでした。</font>';
		echo '<a href ="index.php">戻る</a>';
	break;

	case "confirm":
		//パス入力、確認
		echo '削除します。<br />';
		echo '削除パスを入力して下さい。<br/>';
		echo $delete;
		echo '<a href ="index.php">戻る</a>';
	break;
	
	default:
}
?>
