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
<h2>確認</h2>

<div id="post_tittle_form">	
<?php
	//データベースへの接続
	$db = mysqli_connect("localhost","root","","TRANING02") or die('ERROR!(connect):MySQLサーバーへの接続に失敗しました。1');
	mysqli_query($db,"SET NAMES utf8");

	$name =$_POST[name];
	$comment =$_POST[comment];
	$pass =$_POST[pass];

echo '名前：'.$name.'<br/>';
echo 'コメント'.$comment.'<br/>';
echo 'パスワード'.$pass.'<br/>';

if(!empty($name) && !empty($comment) && !empty($pass)) {

	$button ='<form method="post" action=" '.$_SERVER['PHP_SELF'] .' " > '.
		'<input type="hidden" value="'.$name.'" name="name" />'.
		'<input type="hidden" value="'.$comment.'" name="comment" />'.
		'<input type="hidden" value="'.$pass.'" name="pass" />'.
		'<input type="submit" value="実行" name="submit" />'.
		'</form>';
		
	echo 'この内容で書き込みしますか？';
	echo $button;

	if(isset($_POST['submit']) && $_POST['submit'] == '実行'){

		$name =$_POST[name];
		$comment =$_POST[comment];
		$pass =$_POST[pass];
	
		if(!empty($name) && !empty($comment) && !empty($pass)) {
			
			$query ="INSERT INTO comments(name,comment,pass) VALUES('$name','$comment','$pass')";
			$result =mysqli_query($db,$query) or die('ERROR!1');
			
			echo 'コメントが登録されました。';
		}
	}
}
else{
	echo '<font color ="red">error!: 全ての項目を入力して下さい！</font>';
}

mysqli_close($db);

?>	
<br/><br/>
<a href ="index.php">戻る</a>
</div>
</div><!-- waku_END -->

</body>
</html>
