<div style="padding: 10px; margin-bottom: 10px; border: 5px double #333333; width :450;">
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
		<input type="text" id="comment" name="comment" value="<?php echo $comment; ?>"/><br />
		<label for="pass">削除パス:</label>
		<input type="pass" id="pass" name="pass" value="<?php echo $pass; ?>"/><br />
		　　　　　　　<input type="submit" value="送信" name="submit" />
		<input type="hidden" value="confirm" name="action">
	</form>
	
</div>