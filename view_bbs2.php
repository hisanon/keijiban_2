<?php session_start(); ?>
<!---掲示板部分の表示--->
<table border="1" width="500" cellspacing="0" cellpadding="5">
	<tr>
	<th width="100">時間</th><th width="100">投稿者</th><th width="500">コメント</th><th width="20">削除</th>
	</tr>

<?php $dtcnt = COUNTS($db,$name,$comment,$pass); ?>
		全コメント数<?php echo $dtcnt; ?>件
	
<?php
	$sth= ALLDATA($db,$st,$lim);
	while($row =$sth->fetch(PDO::FETCH_ASSOC)){
	
	$id = $row['id'];
	$time = $row['time'];
	$user_id = $row['user_id'];
	$comment =$row['comment'];
	$image_file =$row['image_file'];
	
	$sth2= NAMEDATA($db,$user_id);
	$row =$sth2->fetch(PDO::FETCH_ASSOC);
	
	$user_name =$row['user_name'];
?>

	<tr>
	<td><?php echo $time; ?></td>
	<td><?php echo $user_name; ?></td>
	<td><?php echo nl2br ($comment); 
			if($image_file){
				$image_path = upload_image_path($image_file);
				echo '<p><image width="200px" src=" '.$image_path.' "></p>';
			} ?>
	</td>
	<td>
		<form method="post" action="index.php" >
		<input type="hidden" value="<?php echo $id; ?>" name="id" />
		<input type="hidden" value="delete" name="action" />
		<input type="submit" value="削除" name="submit" />
		</form>
	</td>
	</tr>

<?php
}?>
</table>
<?php 
if($p>1){
?>
<a href ="<?php $_SERVER['PHP_SELF']; ?>?p=<?php echo $prev; ?>">←前のページ</a>
<?php
}
if(($next -1) * $lim < $dtcnt){
?>	
<a href ="<?php $_SERVER['PHP_SELF']; ?>?p=<?php echo $next; ?>">次のページ→</a>

<?php } ?>
