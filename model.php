<?php
//データベースの接続
require_once 'db.php';

//POSTの取得
$action =$_POST['action'];

	$id = $_POST['id'];
	$name =$_POST['name'];
	$comment =$_POST['comment'];
	$time = $_POST['time'];
	$delete_pass = $_POST['delete_pass'];
	$pass =$_POST['pass'];
	
//掲示板部分の表示
function ALLDATA($db){
	$sth =$db->prepare("SELECT * FROM comments ORDER by id desc");
	$sth->execute();
	return $sth;
}

//書き込み部分の表示
function INSERTBBS($db,$name,$comment,$pass){
try{
	$sth =$db->prepare("INSERT INTO comments(name,comment,pass) VALUES('$name', '$comment', '$pass')");
	$sth->execute();
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