<?php
	$sv = 'localhost';
	$tbl = 'TRANING02';
	$uid = 'root';
	$pwd = '';


	//データベースへの接続
	try{
	$db = new PDO('mysql:host='.$sv.';dbname='.$tbl, $uid, $pwd);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$db->exec('SET NAMES utf8');	
	}
	catch(PDOException $e){
	die('Connection failed: '.$e->getMessage());
	}
	
	
	//$db =mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die('ERROR!(connect):MySQLサーバーへの接続に失敗しました。1');
	//mysqli_query($db,"SET NAMES utf8");
	
	
//	function cutting($db){
	//mysqli_close($db);
	//return $cutting;
	//}

?>