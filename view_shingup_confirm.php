<?php session_start(); ?>
<!---初期画面の表示--->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>TRANING01_a</title>
</head>
<body>
<div id="waku">
<div id="sample-title"><h1>TRANING02</h1></div>

<div class="sample-contents">
<h2>会員登録</h2>

<h2>新規会員情報確認</h2>
 
<!---書き込み内容--->
　　名前　：<?php echo $_SESSION['user_name']; ?> <br />
　アドレス：<?php echo $_SESSION['mail']; ?> <br />
パスワード：<?php echo $_SESSION['user_pass']; ?> <br />
この内容で登録します。
<form method ="post" action ="index.php">
<input type="hidden" name="action" value="shingup_complete">
　　　　　　　　<input type="submit" value="登録"></form>
<br />
<a href ="view_shingup.php">戻る</a>
 
 
 		
</div>
</div><!-- waku_END -->

</body>
</html>
