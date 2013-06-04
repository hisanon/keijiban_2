<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>TRANING02</title>
</head>
<body>
<div id="sample-title"><h1>TRANING02</h1></div>

<div class="sample-contents">
<h2>削除</h2>

<?php
	//データベースへの接続
	$db = mysqli_connect("localhost","root","","TRANING02") or die('ERROR!(connect):MySQLサーバーへの接続に失敗しました。1');
	mysqli_query($db,"SET NAMES utf8");
	
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
		
		echo $pass;
		echo '削除しました。';
	}
	else{
		echo '削除しようとしましたが、';
		echo '<br/><font color ="red">削除パスが認証されないため削除出来ませんでした。</font>';
	}
}
else{
	echo '削除します。<br />';
	echo '削除パスを入力して下さい。<br/>';
	
		$delete = '<form method="post" action=" '.$_SERVER['PHP_SELF'] .' " > '.
			'<label for="pass">削除パス:</label>'.
			'<input type="text" id="pass" name="pass" value=" '.$pass.' "/><br /> '.
			'<input type="hidden" value="'.$id.'" name="id" />'.
			'<input type="hidden" value="'.$name.'" name="name" />'.
			'<input type="hidden" value="'.$comment.'" name="comment" />'.
			'<input type="hidden" value="'.$delete_pass.'" name="delete_pass" />'.
			'<input type="hidden" value="'.$time.'" name="time" />'.
			'<input type="submit" value="実行" name="submit" /> '.
			'<input type="hidden" value="insert" name="flag"> '.
			'</form>';
	echo $delete;
	
}
?>
<br/><br/>
<a href ="index.php">戻る</a>

</body>
</html>
