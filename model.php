<?php
//データベースの接続
require_once 'db.php';

//POSTの取得
$action =$_POST['action'];

	$id = $_POST['id'];
	$comment =$_POST['comment'];
	$time = $_POST['time'];
	$delete_pass = $_POST['delete_pass'];
	$pass =$_POST['pass'];
	$mail =$_POST['mail'];
	$user_pass =$_POST['user_pass'];
	$user_name =$_POST['user_name'];

//セッションのセット
if(isset($user_name)){
	$_SESSION['user_name']= $user_name;
	$_SESSION['user_pass']= $user_pass;
	$login = True;
}	
	
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

//会員登録	
function INSERTUSERS($db,$user_name,$mail,$user_pass){
try{
	$sth =$db->prepare("INSERT INTO USERS(user_name,mail,user_pass) VALUES( ? , ? , ?)");
	$sth->execute(array($user_name , $comment , $user_pass ));
}
catch(PDOException $e){
	die('Insert failed: '.$e->getMessage());
}
	return $sth;
}

//会員情報を確認
function SHINGUP ($db,$user_name,$mail,$user_pass){
		$sth = $db -> query("SELECT user_name,user_pass FROM USERS WHERE user_name='$user_name' AND user_pass='$user_pass'
		") or die('ERROR!2');
		$sth->execute();
		if($sth ->rowCount(1)){ 
			$login = True;
		}
		else{
			$login =False;
		}
	return $login;
}


//コメント数の確認
function COUNTS($db,$name,$comment,$pass){
	$sth = $db -> query("SELECT * FROM comments") or die('ERROR!2');
	$sth->execute();
	$dtcnt = $sth ->rowCount( );
	return $dtcnt;
}

//掲示板部分の表示
function ALLDATA($db,$id,$name,$comment,$pass,$st,$lim){
	$sth =$db->prepare("SELECT * FROM comments ORDER by id desc LIMIT $st,$lim");
	$sth->execute();
	return $sth;
}

//会員登録部分の表示
function INSERTUSER($db,$name,$mail,$pass){
try{
	$sth =$db->prepare("INSERT INTO USERS(user_name,mail,user_pass) VALUES( ? , ? , ?)");
	$sth->execute(array($name , $mail , $pass ));
}
catch(PDOException $e){
	die('Insert failed: '.$e->getMessage());
}
	return $sth;
}


//書き込み部分の表示
function INSERTBBS($db,$name,$comment,$pass){
try{
	$sth =$db->prepare("INSERT INTO comments(name,comment,pass) VALUES( ? , ? , ?)");
	$sth->execute(array($name , $comment , $pass ));
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