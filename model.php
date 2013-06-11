<?php
require_once 'db.php';

function ALLDATA($database){
	$query ="SELECT * FROM comments ORDER by id desc" ;
	$re =mysqli_query($database,$query) or die('ERROR!2');
	return $re;
}

function INSERTBBS($db,$name,$comment,$pass){
	$query ="INSERT INTO comments(name,comment,pass)VALUES('$name','$comment','$pass')";
	$result =mysqli_query($db,$query) or die('ERROR!1');

	return $result;
}

function DELETEBBS($db,$name,$comment,$pass,$id){
	$query ="DELETE FROM comments WHERE id = $id";
	$result =mysqli_query($db,$query) or die('ERROR:削除出来ませんでした。');
	return $result;
}

?>