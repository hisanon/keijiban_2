<?php
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'TRANING02');


	//データベースへの接続
	$db =mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die('ERROR!(connect):MySQLサーバーへの接続に失敗しました。1');
	mysqli_query($db,"SET NAMES utf8");
	
	
	function cutting($db){
	mysqli_close($db);
	return $cutting;
	}

?>