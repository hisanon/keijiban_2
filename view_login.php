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
		<label for="name">　　名前　:</label>
		<input type="text" id="name" name="name" value="<?php echo $form_g['name']; ?>"/><br />
<?php if (empty($form_g['name']) && empty($ec)) { ?>
		<div style ="color:red">名前を入力して下さい！</div>
<?php } ?>
		<label for="comment">　アドレス:</label>
		<input type="text" id="mail" name="mail" value="<?php echo $form_g['mail']; ?>"/><br />
<?php if (empty($form_g['mail']) && empty($ec)) { ?>
		<div style ="color:red">アドレスを入力して下さい！</div>
<?php } ?>
		<label for="user_pass">パスワード:</label>
		<input type="password" id="user_pass" name="user_pass" maxlength="8" value="<?php echo $form_g['user_pass']; ?>" /><br />
<?php if (empty($form_g['user_pass']) && empty($ec)) { ?>
		<div style ="color:red">パスワードを入力して下さい！</div>
<?php } ?>
		　　　　　　　<input type="submit" value="ログイン" name="submit" />
		<input type="hidden" value="login_complete" name="action">
	</form>

<br /><br />
</div>
</div><!-- waku_END -->

</body>
</html>
