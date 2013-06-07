<?php
//掲示板のcontroll部分
require_once 'model.php';
while($row =mysqli_fetch_array($result_s)){

	$id = $row['id'];
	$name =$row['name'];
	$comment =$row['comment'];
	$delete_pass =$row['pass'];
	$time = $row['time'];

		echo '<tr>';
		echo '<td>'.$time.'</td>';
		echo '<td>'.$name.'</td>';
		echo '<td>'.$comment.'</td>';

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
 echo $cutting;
?>