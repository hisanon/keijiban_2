<?php
$comments = "";

$id ="";
$name = "";
$comment= "";
$delete_pass = "";
$time = "";
$pass = "";

	$id =$_POST['id'];
	$name = $_POST['name'];
	$comment= $_POST['comment'];
	$delete_pass = $_POST['delete_pass'];
	$time = $_POST['time'];
	$pass = $_POST['pass'];


if(isset($_POST['submit']) && $_POST['submit'] == '実行'){


	if($pass == $delete_pass){
		//削除実行、完了
		
		require_once 'delete_model.php';

		$comments ="completion";

	}
	else{
		//パス違い
		$comments ="error";

	}
}
else{	
		//パス入力、確認
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
		
		$comments = "confirm";
		
}
echo $cutting;
?>