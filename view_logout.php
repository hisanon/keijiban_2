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
<h2>ログアウト</h2>
<h2><?php echo $user_name; ?>の名前でログイン中です。<br />ログアウトしてもよろしいですか？</h2>

<form method="post" action="index.php " >
<input type="submit" value="はい" name="submit" />
<input type="hidden" value="logout_complete" name="action">
</form>

<form method="post" action="index.php " >
<input type="submit" value="いいえ" name="submit" />
<input type="hidden" value="" name="action">
</form>
		
</div>
</div><!-- waku_END -->

</body>
</html>
