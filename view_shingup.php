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

<!--ログインの確認(ログイン状態)-->
<?php if($login == True){
echo $error_msg; ?>
<br /><a href ="view_logout.php">ログアウト</a><br />
<a href ="index.php">掲示板に戻る</a><br />
<?php } ?>

<!--ログインの確認(非ログイン状態)-->
<?php if($login == False){ ?>
<a href ="view_login.php">ログイン</a><br />

<h2>新規会員情報入力</h2>
  <form method="post" action="index.php " >
		<label for="user_name">　　名前　:</label>
		<input type="text" id="user_name" name="user_name" value="<?php echo $user_name; ?>"/><br />
<?php if (empty($user_name) && !empty($action)) { ?>
		<div style ="color:red">名前を入力して下さい！</div>
<?php } ?>
		<label for="mail">　アドレス:</label>
		<input type="text" id="mail"  name="mail" value="<?php echo $mail; ?>"/><br />
<?php if (empty($mail) && !empty($action)) { ?>
		<div style ="color:red">アドレスを入力して下さい！</div>
<?php } ?>
		<label for="pass">パスワード:</label>
		<input type="pass" id="pass" name="user_pass" value="<?php echo $user_pass; ?>" /><br />
<?php if (empty($user_pass) && !empty($action)) { ?>
		<div style ="color:red">パスワードを入力して下さい！</div>
<?php } ?>
		　　　　　　　<input type="submit" value="確認" name="submit" />
		<input type="hidden" value="shingup" name="action">
	</form>
<?php } ?>
		
</div>
</div><!-- waku_END -->

</body>
</html>
