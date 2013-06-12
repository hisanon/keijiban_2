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

<div style="padding: 10px; margin-bottom: 10px; border: 5px double #333333; width :450;">

<h2>コメントフォーム</h2>
  <form method="post" action="index.php " >
		<label for="name">　名前　:</label>
		<input type="text" id="name" name="name" value="<?php echo $name; ?>"/><br />
<?php if (empty($name) && !empty($action)) { ?>
		<div style ="color:red">名前を入力して下さい！</div>
<?php } ?>
		<label for="comment">コメント:</label>
		<textarea id="comment" name="comment"  cols="30" rows="5"><?php echo $comment; ?></textarea><br />
<?php if (empty($comment) && !empty($action)) { ?>
		<div style ="color:red">コメントを入力して下さい！</div>
<?php } ?>
		<label for="pass">削除パス:</label>
		<input type="pass" id="pass" name="pass" value="<?php echo $pass; ?>" /><br />
<?php if (empty($pass) && !empty($action)) { ?>
		<div style ="color:red">パスワードを入力して下さい！</div>
<?php } ?>
		　　　　　　　<input type="submit" value="送信" name="submit" />
		<input type="hidden" value="confirm" name="action">
	</form>

</div>
		
<?php
//掲示板部分の表示
require_once 'view_bbs.php';

?>	
</div>
</div><!-- waku_END -->

</body>
</html>
