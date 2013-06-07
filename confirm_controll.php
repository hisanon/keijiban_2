<?php

$name="";
$comment="";
$pass ="";


	$name =$_POST['name'];
	$comment =$_POST['comment'];
	$pass =$_POST['pass'];

if(isset($_POST['submit']) && $_POST['submit'] == '実行'){
	
	require_once 'confirm_model.php';
	
	//コメントの登録
	$comments="completion";	

}
else{
	if(!empty($name) && !empty($comment) && !empty($pass)) {

		$button ='<form method="post" action="index.php" > '.
			'<input type="hidden" value="'.$name.'" name="name" />'.
			'<input type="hidden" value="'.$comment.'" name="comment" />'.
			'<input type="hidden" value="'.$pass.'" name="pass" />'.
			'<input type="hidden" value="confirm" name="action" />'.
			'　　　　　<input type="submit" value="実行" name="submit" />'.
			'</form>';
		//登録確認画面
		$comments = "confirm";
	}
	else{
		//エラー
		$comments = "error";
	}
}
echo $cutting;
?>	