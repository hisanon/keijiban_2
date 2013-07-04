<?php
require_once 'master.php';
?>


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
<h3><?php echo htmlspecialchars_decode ($_SESSION['user_name'] , ENT_QUOTES); ?>としてログイン中です。</h3>

<div style ="color:red">
<?php echo $comp_msg.$error_msg; ?>
</div>

<a href ="view_logout.php">ログアウト</a><br />

<div style="padding: 10px; margin-bottom: 10px; border: 5px double #333333; width :450;">

<h2>コメントフォーム</h2>

	<form enctype="multipart/form-data" method="post" action="index.php" >
		<label for="comment">コメント:</label>
		<textarea id="comment" name="comment"  cols="30" rows="5"> <?php echo htmlspecialchars_decode ($comment, ENT_QUOTES); ?></textarea><br />
<?php if (empty($comment) && !empty($ec)) { ?>
		<div style ="color:red">コメントを入力して下さい！</div>
<?php } ?>
		<label for="pass">削除パス:</label>
		<input type="password" id="pass" name="pass" maxlength="4" value="<?php  echo htmlspecialchars_decode ($pass, ENT_QUOTES); ?>"><br />
<?php if (empty($pass) && !empty($ec)) { ?>
		<div style ="color:red">パスワードを入力して下さい！</div>
<?php } ?>
		<label for="image_file">　画像　:</label>
		<input type="file" id="image_file" name="image_file" /><br />

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

