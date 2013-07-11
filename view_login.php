<?php require_once 'model.php';
list($color,$bbs_name) = layout($db);
require_once 'color.php'; ?>

<!---初期画面の表示--->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
    <link rel="stylesheet" href="<?php echo $css; ?>" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $bbs_name; ?></title>
</head>
<body class="back">

    <h1 class= "title"><?php echo $bbs_name; ?></h1>

<h2>ログイン画面</h2>
<div class="comment">
<table>
<div style ="color:red">
<?php echo $error_msg.$comp_msg; ?>
</div>

<a href ="view_shingup.php">会員登録</a><br /><br />

  <form method="post" action="index.php " >
		<label for="user_name">　　名前　:</label>
		<input type="text" id="user_name" name="user_name" value="<?php echo htmlspecialchars_decode ($user_name ,ENT_COMPAT); ?>"/><br />
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
</table>
</div>
    
<br /><br />

</body>
</html>
