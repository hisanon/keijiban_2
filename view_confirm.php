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

名前：<?php echo $name; ?> <br />
コメント：<?php echo nl2br ($comment); ?> <br />
削除パス：<?php echo $pass; ?> <br />
この内容で書き込みます。
<form method ="post" action ="index.php">
<input type="hidden" name="name" value="<?php echo $name; ?>">
<input type="hidden" name="comment" value="<?php echo $comment; ?>">
<input type="hidden" name="pass" value="<?php echo $pass; ?>">
<input type="hidden" name="action" value="complete">
<input type="submit" value="送信"></form>
<br />
<a href ="index.php">戻る</a>

</div>

<?php
		
//掲示板部分の表示
require_once 'view_bbs.php';

?>	
</div>
</div><!-- waku_END -->

</body>
</html>
