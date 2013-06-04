<?php
$name="";
$comment="";
$pass ="";
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>TRANING01_a</title>
</head>
<body>
<div id="waku">
<div id="sample-title"><h1>TRANING02</h1></div>

<div class="sample-contents">
<h2>フォーム</h2>

<div id="post_tittle_form">
  <form method="post" action="confirm.php" >
		<label for="name">名前:</label>
		<input type="text" id="name" name="name" value="<?php echo $name; ?>"/><br />
		<label for="comment">コメント:</label>
		<input type="text" id="comment" name="comment" value="<?php echo $comment; ?>"/><br />
		<label for="pass">削除パス:</label>
		<input type="pass" id="pass" name="pass" value="<?php echo $pass; ?>"/><br />
		<input type="submit" value="送信" name="submit" />
		<input type="hidden" value="insert" name="flag">
	</form>

<table border="1" width="500" cellspacing="0" cellpadding="5">
	<tr>
	<th width="100">時間</th><th width="100">投稿者</th><th width="500">コメント</th><th width="20">削除</th>
	</tr>
		
<?php
	//データベースへの接続
	$db = mysqli_connect("localhost","root","","TRANING02") or die('ERROR!(connect):MySQLサーバーへの接続に失敗しました。1');
	mysqli_query($db,"SET NAMES utf8");

if(isset($_POST['submit']) && $_POST['submit'] == '実行'){
	echo '<font color ="red">コメントが登録されました。</font>';
}

	$query ="SELECT * FROM comments" ;
	$result =mysqli_query($db,$query) or die('ERROR!2');

		while($row =mysqli_fetch_array($result)){

			$id = $row['id'];
			$name =$row['name'];
			$comment =$row['comment'];
			$delete_pass =$row['pass'];
			$time = $row['time'];
			

				echo '<tr>';
				echo '<td>'.$time.'</td>';
				echo '<td>'.$name.'</td>';
				echo '<td>'.$comment.'</td>';

						$delete_button = '<form method="post" action="delete.php" >'.
						'<input type="hidden" value="'.$id.'" name="id" />'.
						'<input type="hidden" value="'.$name.'" name="name" />'.
						'<input type="hidden" value="'.$comment.'" name="comment" />'.
						'<input type="hidden" value="'.$delete_pass.'" name="delete_pass" />'.
						'<input type="hidden" value="'.$time.'" name="time" />'.
						'<input type="submit" value="削除" name="submit" />'.
						'</form>';
				echo '<td>'.$delete_button.'</td>';
				echo '</tr>';
				
		}
mysqli_close($db);
?>	
</table>
</div>
</div><!-- waku_END -->

</body>
</html>
