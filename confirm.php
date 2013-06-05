<?php
require_once 'db.php';

$name="";
$comment="";
$pass ="";
?>
<div style="padding: 10px; margin-bottom: 10px; border: 5px double #333333; width :450;">
<h2>確認</h2>

<div id="post_tittle_form">	
<?php
	$name =$_POST[name];
	$comment =$_POST[comment];
	$pass =$_POST[pass];

if(isset($_POST['submit']) && $_POST['submit'] == '実行'){

	$name =$_POST[name];
	$comment =$_POST[comment];
	$pass =$_POST[pass];
	
	if(!empty($name) && !empty($comment) && !empty($pass)) {
			
		$query ="INSERT INTO comments(name,comment,pass) VALUES('$name','$comment','$pass')";
		$result =mysqli_query($db,$query) or die('ERROR!1');
			
		echo '<font color ="red">コメントが登録されました。</font>';
		echo '<a href ="index.php">戻る</a><br/><br/>';
	}
}
else{
echo '　名前：　'.$name.'<br/>';
echo 'コメント：'.$comment.'<br/>';
echo '削除パス：'.$pass.'<br/>';

if(!empty($name) && !empty($comment) && !empty($pass)) {

	$button ='<form method="post" action="index.php" > '.
		'<input type="hidden" value="'.$name.'" name="name" />'.
		'<input type="hidden" value="'.$comment.'" name="comment" />'.
		'<input type="hidden" value="'.$pass.'" name="pass" />'.
		'<input type="hidden" value="confirm" name="action" />'.
		'　　　　　<input type="submit" value="実行" name="submit" />'.
		'</form>';
		
	echo 'この内容で書き込みしますか？';
	echo $button;
	echo '<a href ="index.php">戻る</a>';

}
else{
	echo '<font color ="red">error!: 全ての項目を入力して下さい！</font>';
}
}
?>	
</div></div>