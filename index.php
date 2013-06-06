<?php
require_once 'view.php';
require_once 'db.php';
require_once 'controller.php';
require_once 'model.php';

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

		while($row =mysqli_fetch_array($result_s)){

			$id = $row['id'];
			$name =$row['name'];
			$comment =$row['comment'];
			$delete_pass =$row['pass'];
			$time = $row['time'];
			$button = "削除";
			$action = "delete";
			$pass ="";

				echo '<tr>';
				echo '<td>'.$time.'</td>';
				echo '<td>'.$name.'</td>';
				echo '<td>'.$comment.'</td>';
								
				echo '<td>';
				echo $form;
				echo '</td>';
				echo '</tr>';
				
		}
mysqli_close($db);
?>	
</table>
