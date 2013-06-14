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
	
	$pager = pager($db,$id,$name,$comment,$pass);

	
	//取り出す最大レコード数
$lim =2;

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



	//総ページ数の計算
function pager($db,$id,$name,$comment,$pass){
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
$sql = "SELECT * FROM comments ";
$stmt = $db->query($sql);
$stmt->execute();
$count=$stmt->rowCount();
	return $count;
}

$pager =pager($db,$id,$name,$comment,$pass);

//掲示板部分の表示
function ALLDATA($db,$id,$name,$comment,$pass,$st,$pager){
	$sth =$db->prepare("SELECT * FROM comments ORDER by id desc");
	$sth->execute();
	return $sth;
}



//function pager($id,$j){

	//for($i=1; $i<=$j; $i ++){
		//echo '<input type="submit" value=" '.$i.' " name="submit" />　';
//	}
//return $pa;
//}


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