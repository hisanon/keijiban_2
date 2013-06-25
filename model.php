<?php
//データベースの接続
require_once 'db.php';

//POSTの取得
$action =$_POST['action'];
$ec = $_POST['ec'];


	$form_g['user_name']=$_SESSION['user_name'];
	$form_g['user_id']=$_SESSION['user_id'];
	$form_g['comment']=$_SESSION['comment'];
	$form_g['pass']=$_SESSION['pass'];
	
		
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
	
//アドレスのチェック
	$ret = preg_match("/^[a-zA-Z0-9_\.\-]+?@[A-Za-z0-9_\.\-]+$/", $form_g['mail']);

//半角の変更
$mail_b = mb_convert_kana($form_g['mail'], "a", "UTF-8");
$user_pass_b = mb_convert_kana($form_g['user_pass'], "a", "UTF-8");

//postの取得
function INPOST(){
	
	return 	$form_g = array("user_id" => "$user_id","id" => "$id","comment" => "$comment","time" => "$time","delete_pass" => "$delete_pass","mail" => "$mail","user_pass" => "$user_pass","pass" => "$pass","user_name" => "$user_name","name" => "$name","delete_user_name" => "$delete_user_name");

	$form_g() = $_POST();
}

//会員登録	
function INSERTUSERS($db,$name,$mail_b,$user_pass){
try{
	$sth =$db->prepare("INSERT INTO USERS(user_name,mail,user_pass) VALUES( ? , ? , ?)");
	$sth->execute(array($name , $mail_b , $user_pass_b ));
}
catch(PDOException $e){
	die('Insert failed: '.$e->getMessage());
}
	return $sth;
}


//ユーザー認証
function LOGIN($user_name,$user_id){
	if(!empty($user_name) && !empty($user_id)){
		$login = True;
	}
	else{
		$login =False;
	}
	return $login;
}


//会員情報を確認
function SHINGUP($db,$user_pass,,$no){
	//ユーザー情報の確認
	$sth = $db -> prepare ("SELECT user_name,user_pass FROM USERS WHERE  user_pass = '$user_pass' AND user_name = '$user_name' ") or die('ERROR!2');
		$sth->execute();
		$cnt =$sth ->rowCount();
		if($cnt == $no){ 
			$form_g['user_name'] =$row['user_name'];
			$form_g['user_pass'] =$row['user_pass'];
			
			$shingup =True;
		}
		else{
			$error_msg ='この内容は既に登録されています。';
			$singup =False;
		}
	return $shingup;
}


//ユーザーidの取得
function GETID($db,$name,$user_pass){
				$sth =$db->prepare("SELECT * FROM USERS WHERE user_pass ='$user_pass' AND user_name ='$name' ");
				$sth->execute();
			$row =$sth->fetch(PDO::FETCH_ASSOC);
			$user_id =$row['user_id'];
			$user_name =$row['user_name'];
			
			return array($form_g['user_id'],$form_g['user_name']);
}


function GETDELETE($db,$id){
				$sth =$db->prepare("SELECT * FROM USERS WHERE id ='$id' ");
				$sth->execute();
			$row =$sth->fetch(PDO::FETCH_ASSOC);
			
			$comment =$row['comment'];
			$delete_pass =$row['pass'];
			$delete_user_name =$row['user_name'];

			return array($comment,$pass,$user_name);
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