<div style="padding: 10px; margin-bottom: 10px; border: 5px double #333333; width :450;">

<h2>削除</h2>

<?php
require_once 'view.php';
require_once 'db.php';

	
	$id =$_POST['id'];
	$name = $_POST['name'];
	$comment= $_POST['comment'];
	$delete_pass = $_POST['delete_pass'];
	$time = $_POST['time'];
		
		echo '時間:'.$time.'<br />投稿者:'.$name.'<br/>コメント:'.$comment.'<br/>この内容を';
		
if(isset($_POST['submit']) && $_POST['submit'] == '実行'){

	$id =$_POST['id'];
	$name = $_POST['name'];
	$comment= $_POST['comment'];
	$delete_pass = $_POST['delete_pass'];
	$time = $_POST['time'];
	$pass = $_POST['pass'];

	if($pass == $delete_pass){
		
		$query ="DELETE FROM comments WHERE id = $id";
		$result =mysqli_query($db,$query) or die('ERROR:削除出来ませんでした。');
		
		echo '<br/><font color ="red">削除しました。</font>';
		echo '<a href ="index.php">戻る</a>';
	}
	else{
		echo '削除しようとしましたが、';
		echo '<br/><font color ="red">削除パスが認証されないため削除出来ませんでした。</font>';
		echo '<a href ="index.php">戻る</a>';
	}
}
else{
	echo '削除します。<br />';
	echo '削除パスを入力して下さい。<br/>';
	
		$delete = '<form method="post" action=" index.php " > '.
			'<label for="pass">削除パス:</label>'.
			'<input type="text" id="pass" name="pass" value="'.$pass.'"/><br /> '.
			'<input type="hidden" value="'.$id.'" name="id" />'.
			'<input type="hidden" value="'.$name.'" name="name" />'.
			'<input type="hidden" value="'.$comment.'" name="comment" />'.
			'<input type="hidden" value="'.$delete_pass.'" name="delete_pass" />'.
			'<input type="hidden" value="'.$time.'" name="time" />'.
			'<input type="hidden" value="delete" name="action" />'.
			'<input type="submit" value="実行" name="submit" /> '.
			'<input type="hidden" value="insert" name="flag"> '.
			'</form>';
	echo $delete;
	echo '<a href ="index.php">戻る</a>';
}
?>
</div>