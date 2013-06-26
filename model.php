<?php
//データベースの接続
require_once 'db.php';

//POSTの取得
$action =$_POST['action'];
$ec = $_POST['ec'];


$user_id =$_POST['$user_id'];
$id =$_POST['$id'];
$comment =$_POST['$comment'];
$time =$_POST['$time'];
$delete_pass =$_POST['$delete_pass'];
$mail =$_POST['$mail'];
$user_pass =$_POST['$user_pass'];
$pass =$_POST['$pass'];
$user_name =$_POST['$user_name'];
$name =$_POST['$name'];
$delete_user_name =$_POST['$delete_user_name'];


	$user_name=$_SESSION['user_name'];
	$user_id=$_SESSION['user_id'];
	$comment=$_SESSION['comment'];
	$pass=$_SESSION['pass'];
	
		
	//取り出す最大レコード数
	$lim =5;

	//ページの位置取得
	$p =intval(@$_GET["p"]);
	if($p < 1){
	$p =1;
	}

	//データの位置を取得する
	$st =($p -1) * $lim;

	//前ページ、次ページの番号の取得
	$prev = $p -1;
	if($prev<1){
		$prev=1;
	}
	$next = $p +1;
	
	$mail =$_POST['mail'];
	$user_pass =$_POST['user_pass'];

//半角の変更
$mail_b = mb_convert_kana($mail, "a", "UTF-8");
$user_pass_b = mb_convert_kana($user_pass, "a", "UTF-8");

//アドレスのチェック
$ret = preg_match("/^[a-zA-Z0-9_\.\-]+?@[A-Za-z0-9_\.\-]+$/", $mail_b);



//会員登録	
function INSERTUSERS($db,$user_name,$mail_b,$user_pass_b){
try{
	$sth =$db->prepare("INSERT INTO USERS(user_name,mail,user_pass) VALUES( ? , ? , ?)");
	$sth->execute(array($user_name , $mail_b , $user_pass_b ));
}
catch(PDOException $e){
	die('Insert failed: '.$e->getMessage());
}
	return $sth;
}


//ユーザー認証
function LOGIN(){
	if(!empty($_SESSION['user_name']) && !empty($_SESSION['user_id'])){
		$login = True;
	}
	else{
		$login =False;
	}
	return $login;
}


//会員情報を確認
function SHINGUP($db,$user_pass,$user_name,$no){
	//ユーザー情報の確認
	$sth = $db -> prepare ("SELECT * FROM USERS WHERE  user_pass = '$user_pass' AND user_name = '$user_name' ") or die('ERROR!2');
		$sth->execute();
		$cnt =$sth ->rowCount();
		if($cnt == $no){ 			
			$shingup =True;
		}
		else{
			$error_msg ='この内容は既に登録されています。';
			$singup =False;
		}
	return $shingup;
}


//ユーザーidの取得
function GETID($db,$user_name_s,$user_pass_s){
				$sth =$db->prepare("SELECT * FROM USERS WHERE user_pass ='$user_pass_s' AND user_name ='$user_name_s' ");
				$sth->execute();
			$row =$sth->fetch(PDO::FETCH_ASSOC);
			$user_id =$row['user_id'];
			
			return $user_id;
}


function GETDELETE($db,$id){
				$sth =$db->prepare("SELECT * FROM USERS WHERE id ='$id' ");
				$sth->execute();
			$row =$sth->fetch(PDO::FETCH_ASSOC);
			
			$delete_comment =$row['comment'];
			$delete_pass =$row['pass'];
			$delete_user_id =$row['user_id'];

			return array($delete_comment,$delete_pass,$delete_user_id);
}


//コメント数の確認
function COUNTS($db,$name,$comment,$pass){
	$sth = $db -> query("SELECT * FROM comments") or die('ERROR!2');
	$sth->execute();
	$dtcnt = $sth ->rowCount( );
	return $dtcnt;
}

//掲示板部分の表示
function ALLDATA($db,$st,$lim){
	$sth =$db->prepare("SELECT * FROM comments ORDER by id desc LIMIT $st,$lim");
	$sth->execute();
	return $sth;
}

//名前の表示
function NAMEDATA($db,$user_id){
	$sth2 =$db->prepare("SELECT * FROM USERS WHERE user_id ='$user_id' ");
	$sth2->execute();
	return $sth2;
}


//書き込み部分の表示
function INSERTBBS($db,$user_id,$comment,$pass){
try{
	$sth =$db->prepare("INSERT INTO comments(comment,pass,user_id) VALUES( ? , ? , ?)");
	$sth->execute(array($comment , $pass ,$user_id));
}
catch(PDOException $e){
	die('Insert failed: '.$e->getMessage());
}
	return $sth;
}

//削除部分の表示
function DELETEBBS($db,$id){
try{
	$sth =$db->prepare("DELETE FROM comments WHERE id = $id");
	$sth->execute();	
	}
catch(PDOException $e){
	die('Delete failed: '.$e->getMessage());
	}
	return $result;
}

?>