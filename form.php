<?php
$name="";
$comment="";
$pass ="";
?>
<h2>コメントフォーム</h2>
  <form method="post" action="index.php" >
		<label for="name">　名前　:</label>
		<input type="text" id="name" name="name" value="<?php echo $name; ?>"/><br />
		<label for="comment">コメント:</label>
		<textarea id="comment" name="comment"  cols="30" rows="5"><?php echo $comment; ?></textarea><br />
		<label for="pass">削除パス:</label>
		<input type="pass" id="pass" name="pass" value="<?php echo $pass; ?>"/><br />
		　　　　　　　<input type="submit" value="送信" name="submit" />
		<input type="hidden" value="confirm" name="action">
	</form>
