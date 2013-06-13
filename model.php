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
function ALLDATA($db,$id,$name,$comment,$pass){
	$sth =$db->prepare("SELECT * FROM comments ORDER by id desc");
	$sth->execute();
	return $sth;
}

	//総ページ数の計算
function pager($db,$id,$name,$comment,$pass){
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
$sql = "SELECT * FROM comments ";
$stmt = $db->query($sql);
$stmt->execute();
$count=$stmt->rowCount();
echo $count;
	return $count;
}

function pageno(){
 $pageno ="";

for($pageno=1; $pageno<=10000){
	
while(){	
	
	$i = $h+$k;
	$J = $i+5;
	$k = $J ++;
}
echo <a href=\"$PHP_SELF?".$pageno."=".$pageno."\">".$pageno." </a>
}
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