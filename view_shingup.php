<?php session_start();
require_once 'color.php'; 
require_once 'model.php'; ?>
<!---初期画面の表示--->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
    <link rel="stylesheet" href="<?php echo $css; ?>" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $bbs_name; ?></title>
</head>
<body class="back">
<h1 class="tittle"><?php echo $bbs_name; ?></h1>

<h2>会員登録</h2>

<div style ="color:red">
<?php echo $error_msg; ?>
</div><br />

<?php echo $res; ?>

<table>

<!--ログインの確認(ログイン状態)-->
<?php $login=LOGIN();
if($login == True){ ?>
<p>既に<?php echo htmlspecialchars_decode ($_SESSION['user_name'] ,ENT_COMPAT) ?>の名前でログインしています。<br />
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
		<input type="text" id="name" name="user_name" value="<?php echo htmlspecialchars_decode ($user_name ,ENT_COMPAT); ?>" /><br />
<?php if (empty($user_name) && !empty($ec)) { ?>
		<div style ="color:red">名前を入力して下さい！</div>
<?php } ?>
		<label for="mail">　アドレス:</label>
<?php if (empty($mail) && !empty($ec)) { ?>
		<input type="text" id="mail"  name="mail" value="<?php echo htmlspecialchars_decode ($mail ,ENT_COMPAT); ?>"/><br />
		<div style ="color:red">アドレスを入力して下さい！</div> 
<?php } 
elseif (!empty($error_mail) && !empty($ec)) { ?>
		<input type="text" id="mail"  name="mail" value=""/><br />
		<div style ="color:red"><?php echo $error_mail; ?></div>
<?php } 
else  { ?>
		<input type="text" id="mail"  name="mail" value=""/><br />
		<div style ="color:red"><?php echo $error_mail; ?></div>
<?php } ?>
		<label for="user_pass">パスワード:</label>
		<input type="password" id="user_pass" name="user_pass" maxlength="8" value="" /><br />
<?php if (empty($user_pass) && !empty($ec)) { ?>
		<div style ="color:red">パスワードを入力して下さい！</div>
<?php } ?>
		　　　　　　　<input type="submit" value="確認" name="submit" />
		<input type="hidden" value="shingup" name="action">
		<input type="hidden" value="ec" name="ec">
	</form>
<?php } ?>
		
</table>
</body>
</html>
