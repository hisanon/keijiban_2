<?php
	//データベースへの接続
	$db =mysqli_connect("localhost","root","","TRANING02") or die('ERROR!(connect):MySQLサーバーへの接続に失敗しました。1');
	mysqli_query($db,"SET NAMES utf8");
		
?>