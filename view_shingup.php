<?php session_start();
require_once 'model.php'; ?>
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

<div style ="color:red">
<?php echo $error_msg; ?>
</div><br />

<!--ログインの確認(ログイン状態)-->
<?php $login=LOGIN($user_name,$user_id);
if($login == True){ ?>
<p>既に<?php echo $_SESSION['user_name'] ?>の名前でログインしています。<br />
ログアウトしてからログインして下さい。</p>
<br /><a href ="view_logout.php">ログアウト</a><br />
<a href ="index.php">掲示板に戻る</a><br />
<?php } ?>

<!--ログインの確認(非ログイン状態)-->
<?php if($login == False){ ?>
<a href ="view_login.php">ログイン</a><br />

<h2>新規会員情報入力</h2>
  <form method="post" action="index.php " >
		<label for="name">　　名前　:</label>
		<input type="text" id="name" name="name" value="<?php echo $form_g['name']; ?>" /><br />
<?php if (empty($name) && !empty($ec)) { ?>
		<div style ="color:red">名前を入力して下さい！</div>
<?php } ?>
		<label for="mail">　アドレス:</label>
		<input type="text" id="mail"  name="mail" value="<?php echo $form_g['mail']; ?>"/><br />
<?php if (empty($mail) && !empty($ec)) { ?>
		<div style ="color:red">アドレスを入力して下さい！</div>
<?php } ?>
		<label for="user_pass">パスワード:</label>
		<input type="password" id="user_pass" name="user_pass" maxlength="8" value="" /><br />
<?php if (empty($form_g['user_pass']) && !empty($ec)) { ?>
		<div style ="color:red">パスワードを入力して下さい！</div>
<?php } ?>
		　　　　　　　<input type="submit" value="確認" name="submit" />
		<input type="hidden" value="shingup" name="action">
		<input type="hidden" value="ec" name="ec">
	</form>
<?php } ?>
		
</div>
</div><!-- waku_END -->

</body>
</html>
