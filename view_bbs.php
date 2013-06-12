<!---掲示板部分の表示--->
<table border="1" width="500" cellspacing="0" cellpadding="5">
	<tr>
	<th width="100">時間</th><th width="100">投稿者</th><th width="500">コメント</th><th width="20">削除</th>
	</tr>

<?php

$sth= ALLDATA($db,$id,$name,$comment,$pass);


while($row =$sth->fetch(PDO::FETCH_ASSOC)){
	
	$id = $row['id'];
	$name =$row['name'];
	$comment =$row['comment'];
	$delete_pass =$row['pass'];
	$time = $row['time'];
?>

	<tr>
	<td><?php echo $time; ?></td>
	<td><?php echo $name; ?></td>
	<td><?php echo nl2br ($comment); ?></td>
	<td>
		<form method="post" action="index.php" >
		<input type="hidden" value="<?php echo $id; ?>" name="id" />
		<input type="hidden" value="<?php echo $name; ?>" name="name" />
		<input type="hidden" value="<?php echo $comment; ?>" name="comment" />
		<input type="hidden" value="<?php echo $delete_pass; ?>" name="delete_pass" />
		<input type="hidden" value="<?php echo $time; ?>" name="time" />
		<input type="hidden" value="delete" name="action" />
		<input type="submit" value="削除" name="submit" />
		</form>
	</td>
	</tr>
<?php
}
?>

</table>
