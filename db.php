<?php
require_once 'setting.php';
require_once 'index.php';



	//データベースへの接続
	$db =mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die('ERROR!(connect):MySQLサーバーへの接続に失敗しました。1');
	mysqli_query($db,"SET NAMES utf8");


	$query_s ="SELECT * FROM comments ORDER by id desc" ;
	$result_s =mysqli_query($db,$query_s) or die('ERROR!2');

		
		$query ="INSERT INTO comments(name,comment,pass) VALUES('$name','$comment','$pass')";
		
		


		
?>