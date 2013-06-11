<table border="1" width="500" cellspacing="0" cellpadding="5">
	<tr>
	<th width="100">時間</th><th width="100">投稿者</th><th width="500">コメント</th><th width="20">削除</th>
	</tr>

<?php
$result= ALLDATA($db);

	while($row =mysqli_fetch_array($result)){
	
		$id = $row['id'];
		$name =$row['name'];
		$comment =$row['comment'];
		$delete_pass =$row['pass'];
		$time = $row['time'];
			

			echo '<tr>';
			echo '<td>'.$time.'</td>';
			echo '<td>'.$name.'</td>';
			echo '<td>'.nl2br ($comment).'</td>';

				$delete_button = '<form method="post" action="index.php" >'.
				'<input type="hidden" value="'.$id.'" name="id" />'.
				'<input type="hidden" value="'.$name.'" name="name" />'.
				'<input type="hidden" value="'.$comment.'" name="comment" />'.
				'<input type="hidden" value="'.$delete_pass.'" name="delete_pass" />'.
				'<input type="hidden" value="'.$time.'" name="time" />'.
				'<input type="hidden" value="delete" name="action" />'.
				'<input type="submit" value="削除" name="submit" />'.
				'</form>';
			echo '<td>'.$delete_button.'</td>';
			echo '</tr>';
			
	}

?>

</table>
