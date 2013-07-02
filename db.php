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
?>
