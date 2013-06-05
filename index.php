<?php
require_once 'view.php';
require_once 'db.php';
require_once 'controller.php';

$action="";

$action =$_POST['action'];

	switch($action){
		case "delete":
			require_once 'delete.php';
		break;
		
		case "confirm":
			require_once 'confirm.php';
		break;
		
		default:
			require_once 'form.php';
	}
?>	

<table border="1" width="500" cellspacing="0" cellpadding="5">
	<tr>
	<th width="100">時間</th><th width="100">投稿者</th><th width="500">コメント</th><th width="20">削除</th>
	</tr>
		
<?php

	$query ="SELECT * FROM comments ORDER by id desc" ;
	$result =mysqli_query($db,$query) or die('ERROR!2');

		while($row =mysqli_fetch_array($result)){

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
mysqli_close($db);
?>	
</table>
