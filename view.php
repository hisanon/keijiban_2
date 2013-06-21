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
<h2>掲示板</h2>
<h3><?php echo $_SESSION['user_name'].'/'.$_SESSION['user_id']; ?>としてログイン中です。</h3>

<div style ="color:red">
<?php echo $comp_msg.$error_msg; ?>
</div>

<a href ="view_logout.php">ログアウト</a><br />

<div style="padding: 10px; margin-bottom: 10px; border: 5px double #333333; width :450;">

<h2>コメントフォーム</h2>

	<form method="post" action="index.php" >
		<label for="comment">コメント:</label>
		<textarea id="comment" name="comment"  cols="30" rows="5"><?php echo $comment; ?></textarea><br />
<?php if (empty($comment) && !empty($ec)) { ?>
		<div style ="color:red">コメントを入力して下さい！</div>
<?php } ?>
		<label for="pass">削除パス:</label>
		<input type="pass" id="pass" name="pass" value="<?php echo $pass; ?>" /><br />
<?php if (empty($pass) && !empty($ec)) { ?>
		<div style ="color:red">パスワードを入力して下さい！</div>
<?php } ?>
		　　　　　　　<input type="submit" value="送信" name="submit" />
		<input type="hidden" value="confirm" name="action">
	</form>

</div>
		
<?php
//掲示板部分の表示
require_once 'view_bbs2.php';

?>	
</div>
</div><!-- waku_END -->

</body>
</html>
