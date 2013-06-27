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
<h2>ログイン画面</h2>

<div style ="color:red">
<?php echo $error_msg.$comp_msg; ?>
</div>

<a href ="view_shingup.php">会員登録</a><br /><br />

  <form method="post" action="index.php " >
		<label for="user_name">　　名前　:</label>
		<input type="text" id="user_name" name="user_name" value="<?php echo $user_name; ?>"/><br />
<?php if (empty($user_name) && empty($ec)) { ?>
		<div style ="color:red">名前を入力して下さい！</div>
<?php } ?>
		<label for="user_pass">パスワード:</label>
		<input type="password" id="user_pass" name="user_pass" maxlength="8" value="" /><br />
<?php if (empty($user_pass) && empty($ec)) { ?>
		<div style ="color:red">パスワードを入力して下さい！</div>
<?php } ?>
		　　　　　　　<input type="submit" value="ログイン" name="submit" />
		<input type="hidden" value="login" name="action">
	</form>

<br /><br />
</div>
</div><!-- waku_END -->

</body>
</html>
